<?php

namespace Filafly;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\HtmlString;

class PhosphorIconReplacement implements Plugin
{
    private static ?string $style = null;
    
    public function register(Panel $panel): void
    {
        //
    }

    public function boot(Panel $panel): void
    {
        static::configure();
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'phosphor-icon-replacement';
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public static function configure(): void
    {
        $iconMap = collect([
            'panels::global-search.field' => 'phosphor-magnifying-glass',
            'panels::pages.dashboard.actions.filter' => 'phosphor-funnel',
            'panels::pages.dashboard.navigation-item' => 'phosphor-house',
            'panels::pages.password-reset.request-password-reset.actions.login' => 'phosphor-arrow-right',
            'panels::pages.password-reset.request-password-reset.actions.login.rtl' => 'phosphor-arrow-left',
            'panels::resources.pages.edit-record.navigation-item' => 'phosphor-note-pencil',
            'panels::resources.pages.manage-related-records.navigation-item' => 'phosphor-cards-three',
            'panels::resources.pages.view-record.navigation-item' => 'phosphor-eye',
            'panels::sidebar.collapse-button' => 'phosphor-caret-left',
            'panels::sidebar.collapse-button.rtl' => 'phosphor-caret-right',
            'panels::sidebar.expand-button' => 'phosphor-caret-right',
            'panels::sidebar.expand-button.rtl' => 'phosphor-caret-left',
            'panels::sidebar.group.collapse-button' => 'phosphor-caret-up',
            'panels::tenant-menu.billing-button' => 'phosphor-credit-card',
            'panels::tenant-menu.profile-button' => 'phosphor-gear-six',
            'panels::tenant-menu.registration-button' => 'phosphor-plus',
            'panels::tenant-menu.toggle-button' => 'phosphor-caret-down',
            'panels::theme-switcher.light-button' => 'phosphor-sun',
            'panels::theme-switcher.dark-button' => 'phosphor-moon',
            'panels::theme-switcher.system-button' => 'phosphor-monitor',
            'panels::topbar.close-sidebar-button' => 'phosphor-x',
            'panels::topbar.open-sidebar-button' => 'phosphor-list',
            'panels::topbar.group.toggle-button' => 'phosphor-caret-down',
            'panels::topbar.open-database-notifications-button' => 'phosphor-bell',
            'panels::user-menu.profile-item' => 'phosphor-user-circle',
            'panels::user-menu.logout-button' => 'phosphor-sign-out',
            'panels::widgets.account.logout-button' => 'phosphor-sign-out',
            'panels::widgets.filament-info.open-documentation-button' => 'phosphor-book-open',
            'panels::widgets.filament-info.open-github-button' => 'phosphor-github-logo',

            'forms::components.builder.actions.clone' => 'phosphor-copy',
            'forms::components.builder.actions.collapse' => 'phosphor-caret-up',
            'forms::components.builder.actions.delete' => 'phosphor-trash',
            'forms::components.builder.actions.expand' => 'phosphor-caret-down',
            'forms::components.builder.actions.move-down' => 'phosphor-arrow-down',
            'forms::components.builder.actions.move-up' => 'phosphor-arrow-up',
            'forms::components.builder.actions.reorder' => 'phosphor-arrows-down-up',
            'forms::components.checkbox-list.search-field' => 'phosphor-magnifying-glass',
            'forms::components.file-upload.editor.actions.drag-crop' => 'phosphor-crop',
            'forms::components.file-upload.editor.actions.drag-move' => 'phosphor-arrows-out-cardinal',
            'forms::components.file-upload.editor.actions.flip-horizontal' => 'phosphor-arrows-in-line-horizontal',
            'forms::components.file-upload.editor.actions.flip-vertical' => 'phosphor-arrows-in-line-vertical',
            'forms::components.file-upload.editor.actions.move-down' => 'phosphor-arrow-down-circle',
            'forms::components.file-upload.editor.actions.move-left' => 'phosphor-arrow-left-circle',
            'forms::components.file-upload.editor.actions.move-right' => 'phosphor-arrow-right-circle',
            'forms::components.file-upload.editor.actions.move-up' => 'phosphor-arrow-up-circle',
            'forms::components.file-upload.editor.actions.rotate-left' => 'phosphor-arrow-u-down-left',
            'forms::components.file-upload.editor.actions.rotate-right' => 'phosphor-arrow-u-up-right',
            'forms::components.file-upload.editor.actions.zoom-100' => 'phosphor-arrows-out',
            'forms::components.file-upload.editor.actions.zoom-in' => 'phosphor-magnifying-glass-plus',
            'forms::components.file-upload.editor.actions.zoom-out' => 'phosphor-magnifying-glass-minus',
            'forms::components.key-value.actions.delete' => 'phosphor-trash',
            'forms::components.key-value.actions.reorder' => 'phosphor-arrows-down-up',
            'forms::components.repeater.actions.clone' => 'phosphor-copy',
            'forms::components.repeater.actions.collapse' => 'phosphor-caret-up',
            'forms::components.repeater.actions.delete' => 'phosphor-trash',
            'forms::components.repeater.actions.expand' => 'phosphor-caret-down',
            'forms::components.repeater.actions.move-down' => 'phosphor-arrow-down',
            'forms::components.repeater.actions.move-up' => 'phosphor-arrow-up',
            'forms::components.repeater.actions.reorder' => 'phosphor-arrows-down-up',
            'forms::components.select.actions.create-option' => 'phosphor-plus',
            'forms::components.select.actions.edit-option' => 'phosphor-note-pencil',
            'forms::components.text-input.actions.hide-password' => 'phosphor-eye-slash',
            'forms::components.text-input.actions.show-password' => 'phosphor-eye',
            'forms::components.toggle-buttons.boolean.false' => 'phosphor-x',
            'forms::components.toggle-buttons.boolean.true' => 'phosphor-check',
            'forms::components.wizard.completed-step' => 'phosphor-check',

            'tables::actions.disable-reordering' => 'phosphor-check',
            'tables::actions.enable-reordering' => 'phosphor-arrows-down-up',
            'tables::actions.filter' => 'phosphor-funnel',
            'tables::actions.group' => 'phosphor-cards-three',
            'tables::actions.open-bulk-actions' => 'phosphor-dots-three-vertical',
            'tables::actions.toggle-columns' => 'phosphor-square-half',
            'tables::columns.collapse-button' => 'phosphor-caret-down',
            'tables::columns.icon-column.false' => 'phosphor-x-circle',
            'tables::columns.icon-column.true' => 'phosphor-check-circle',
            'tables::empty-state' => 'phosphor-x',
            'tables::filters.query-builder.constraints.boolean' => 'phosphor-check-circle',
            'tables::filters.query-builder.constraints.date' => 'phosphor-calendar',
            'tables::filters.query-builder.constraints.number' => 'phosphor-sigma',
            'tables::filters.query-builder.constraints.relationship' => 'phosphor-arrows-out',
            'tables::filters.query-builder.constraints.select' => 'phosphor-caret-up-down',
            'tables::filters.query-builder.constraints.text' => 'phosphor-translate',
            'tables::filters.remove-all-button' => 'phosphor-x',
            'tables::grouping.collapse-button' => 'phosphor-caret-up',
            'tables::header-cell.sort-asc-button' => 'phosphor-caret-up',
            'tables::header-cell.sort-button' => 'phosphor-caret-down',
            'tables::header-cell.sort-desc-button' => 'phosphor-caret-down',
            'tables::reorder.handle' => 'phosphor-dots-six',
            'tables::search-field' => 'phosphor-magnifying-glass',

            'notifications::database.modal.empty-state' => 'phosphor-x',
            'notifications::notification.close-button' => 'phosphor-x',
            'notifications::notification.danger' => 'phosphor-x-circle',
            'notifications::notification.info' => 'phosphor-info',
            'notifications::notification.success' => 'phosphor-check-circle',
            'notifications::notification.warning' => 'phosphor-warning-circle',

            'actions::action-group' => 'phosphor-dots-three-vertical',
            'actions::create-action.grouped' => 'phosphor-plus',
            'actions::delete-action' => 'phosphor-trash',
            'actions::delete-action.grouped' => 'phosphor-trash',
            'actions::delete-action.modal' => 'phosphor-trash',
            'actions::detach-action' => 'phosphor-link-break',
            'actions::detach-action.modal' => 'phosphor-link-break',
            'actions::dissociate-action' => 'phosphor-link-break',
            'actions::dissociate-action.modal' => 'phosphor-link-break',
            'actions::edit-action' => 'phosphor-note-pencil',
            'actions::edit-action.grouped' => 'phosphor-note-pencil',
            'actions::export-action.grouped' => 'phosphor-tray-arrow-down',
            'actions::force-delete-action' => 'phosphor-trash',
            'actions::force-delete-action.grouped' => 'phosphor-trash',
            'actions::force-delete-action.modal' => 'phosphor-trash',
            'actions::import-action.grouped' => 'phosphor-tray-arrow-up',
            'actions::modal.confirmation' => 'phosphor-warning',
            'actions::replicate-action' => 'phosphor-copy',
            'actions::replicate-action.grouped' => 'phosphor-copy',
            'actions::restore-action' => 'phosphor-arrow-u-up-left',
            'actions::restore-action.grouped' => 'phosphor-arrow-u-up-left',
            'actions::restore-action.modal' => 'phosphor-arrow-u-up-left',
            'actions::view-action' => 'phosphor-eye',
            'actions::view-action.grouped' => 'phosphor-eye',

            'infolists::components.icon-entry.false' => 'phosphor-x-circle',
            'infolists::components.icon-entry.true' => 'phosphor-check-circle',

            'badge.delete-button' => 'phosphor-x',
            'breadcrumbs.separator' => new HtmlString('/'),
            'breadcrumbs.separator.rtl' => new HtmlString('\\'),
            'modal.close-button' => 'phosphor-x',
            'pagination.first-button' => 'phosphor-caret-double-left',
            'pagination.first-button.rtl' => 'phosphor-caret-double-right',
            'pagination.last-button' => 'phosphor-caret-double-right',
            'pagination.last-button.rtl' => 'phosphor-caret-double-left',
            'pagination.next-button' => 'phosphor-caret-right',
            'pagination.next-button.rtl' => 'phosphor-caret-left',
            'pagination.previous-button' => 'phosphor-caret-left',
            'pagination.previous-button.rtl' => 'phosphor-caret-right',
            'section.collapse-button' => 'phosphor-caret-down',
        ]);

        $doNotStyle = [
            'breadcrumbs.separator',
            'breadcrumbs.separator.rtl',
        ];

        FilamentIcon::register(
            $iconMap
            ->mapWithKeys(fn ($icon, $key) => in_array($key, $doNotStyle) ? [$key => $icon] : [$key => $icon . self::$style])
            ->toArray()
        );
    }

    public function thin(): static
    {
        self::$style = '-thin';

        return $this;
    }

    public function light(): static
    {
        self::$style = '-light';

        return $this;
    }

    public function regular(): static
    {
        self::$style = '';

        return $this;
    }

    public function duotone(): static
    {
        self::$style = '-duotone';

        return $this;
    }

    public function fill(): static
    {
        self::$style = '-fill';

        return $this;
    }

    public function bold(): static
    {
        self::$style = '-bold';

        return $this;
    }
}
