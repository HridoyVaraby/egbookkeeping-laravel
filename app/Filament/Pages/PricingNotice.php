<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use App\Models\Setting;

class PricingNotice extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Pricing Notice';
    protected static ?string $title = 'Pricing Notice Settings';
    protected static ?string $slug = 'pricing-notice';
    // Removed navigation group so it stands on its own top-level menu
    protected static ?int $navigationSort = 50;

    protected static string $view = 'filament.pages.pricing-notice';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'pricing_notice_enabled' => Setting::where('key', 'pricing_notice_enabled')->value('value') === '1',
            'pricing_notice_content' => Setting::where('key', 'pricing_notice_content')->value('value'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Global Pricing Notice')
                    ->description('Manage dynamic content displayed on the pricing page below the plans.')
                    ->schema([
                        Toggle::make('pricing_notice_enabled')
                            ->label('Enable Pricing Notice'),
                        RichEditor::make('pricing_notice_content')
                            ->label('Pricing Notice Content')
                            ->helperText('This will be displayed below the pricing table if enabled.')
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::updateOrCreate(
            ['key' => 'pricing_notice_enabled'],
            ['value' => $data['pricing_notice_enabled'] ? '1' : '0']
        );

        Setting::updateOrCreate(
            ['key' => 'pricing_notice_content'],
            ['value' => $data['pricing_notice_content']]
        );

        Notification::make()
            ->title('Pricing Notice Saved')
            ->success()
            ->send();
    }
}
