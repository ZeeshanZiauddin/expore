<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MailResource\Pages;
use App\Models\EmailTemplate;
use App\Models\Mail;
use App\Models\Mailer;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Mail as LaravelMail;
use InfinityXTech\FilamentUnlayer\Forms\Components\Unlayer;
use Illuminate\Support\Facades\Log;
class MailResource extends Resource
{
    protected static ?string $model = Mail::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->label('Select Company')
                    ->relationship('company', 'name')
                    ->required()->live(),
                Forms\Components\Select::make('user_id')
                    ->label('Select User')
                    ->relationship('user', 'name')
                    ->required()->live(),

                Forms\Components\Select::make('email_id')
                    ->label('Select Email')
                    ->options(
                        fn(Get $get) => \App\Models\CompanyEmail::query()
                            ->when(
                                $get('company_id') && $get('user_id'),
                                fn($query) => $query->where('company_id', $get('company_id'))
                                    ->where('user_id', $get('user_id'))
                            )
                            ->pluck('email', 'id')
                            ->toArray()
                    )
                    ->hidden(function ($get) {
                        return !$get('company_id') || !$get('user_id');
                    })
                    ->required()
                    ->live(),
                Forms\Components\TextInput::make('recipient_email')
                    ->label('Recipient Email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->label('Email Subject')
                    ->required(),
                Forms\Components\Select::make('email_template')
                    ->label('Select Template')
                    ->options(EmailTemplate::all()->pluck('name', 'id'))
                    ->afterStateUpdated(function ($state, callable $set) {
                        $template = EmailTemplate::find($state);
                        if ($template) {
                            $set('body', $template->html_content);
                        }
                    })->reactive(),

                Unlayer::make('body')
                    ->label('Email Body')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mailer.email')->label('Mailer'),
                Tables\Columns\TextColumn::make('recipient_email')->label('Recipient'),
                Tables\Columns\TextColumn::make('subject')->label('Subject')->limit(50),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('send_email')
                    ->label('Send Email')
                    ->action(fn($record) => self::sendEmail($record))
                    ->color('primary')
                    ->icon('heroicon-o-paper-airplane'),
            ]);
    }
    // $data = [
    //     'agent_name' => $record->user->name,
    //     'agent_email' => $record->mailer->mail_username,
    //     'recipient_email' => $record->recipient_email,
    //     'date_time' => Carbon::now()->format('D, M j, Y \a\t h:i A'),
    //     'date_of_invoice' => Carbon::now()->format('d-M-y'),
    // ];
    // dd($data);
    // $mailer = $record->mailer;
    // dd([
    //     'mail.default' => 'smtp',
    //     'mail.mailers.smtp.host' => $mailer->mail_host,
    //     'mail.mailers.smtp.port' => $mailer->mail_port,
    //     'mail.mailers.smtp.encryption' => $mailer->mail_encryption,
    //     'mail.mailers.smtp.username' => $mailer->mail_username,
    //     'mail.mailers.smtp.password' => "Zeeshan@explore1234",
    //     'mail.from.address' => $mailer->mail_from_address,
    //     'mail.from.name' => $mailer->mail_from_name ?? 'Explore Flights',
    // ]);

    public static function sendEmail($record)
    {
        try {
            $mailer = $record->mailer;

            if (!$mailer) {
                Log::error('Email configuration not found for record ID: ' . $record->id);
                return back()->with('danger', 'Email configuration not found.');
            }

            // Set mail configuration dynamically
            config([
                'mail.default' => 'smtp',
                'mail.mailers.smtp.host' => $mailer->mail_host,
                'mail.mailers.smtp.port' => $mailer->mail_port,
                'mail.mailers.smtp.encryption' => $mailer->mail_encryption,
                'mail.mailers.smtp.username' => $mailer->mail_username,
                'mail.mailers.smtp.password' => $mailer->mail_password, // FIXED: Securely retrieving the password
                'mail.from.address' => $mailer->mail_from_address,
                'mail.from.name' => $mailer->mail_from_name ?? 'Explore Flights',
            ]);

            $data = [
                'agent_name' => $record->user->name ?? 'Unknown Agent',
                'agent_email' => $mailer->mail_username ?? 'Unknown Email',
                'recipient_email' => $record->recipient_email ?? 'Unknown Recipient',
                'company_logo' => $record->company->logo ?? 'Unknown Recipient',
                'date_time' => Carbon::now()->format('D, M j, Y \a\t h:i A'),
                'date_of_invoice' => Carbon::now()->format('d-M-y'),
            ];

            // Replace Blade-like placeholders with actual values
            $htmlContent = Blade::render($record->body['html'], $data);

            // Send email using Laravel's Mail facade
            LaravelMail::send([], [], function ($message) use ($record, $mailer, $htmlContent) {
                $message->to($record->recipient_email)
                    ->subject($record->subject)
                    ->from($mailer->mail_from_address, $mailer->mail_from_name ?? 'Explore Flights') // FIXED: Corrected from() method
                    ->html($htmlContent);
            });

            // Log success message
            Log::info("Email sent successfully to {$record->recipient_email} for record ID: {$record->id}");

            // Update status after successful send
            $record->update(['status' => 'sent']);
            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            // Log the error message for debugging
            Log::error("Error sending email for record ID: {$record->id}. Message: " . $e->getMessage());

            $record->update(['status' => 'failed', 'error_message' => $e->getMessage()]);
            return back()->with('danger', 'Error sending email: ' . $e->getMessage());
        }
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMails::route('/'),
            'create' => Pages\CreateMail::route('/create'),
            'edit' => Pages\EditMail::route('/{record}/edit'),
        ];
    }
}