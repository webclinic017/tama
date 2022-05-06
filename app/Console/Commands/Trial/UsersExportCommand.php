<?php

namespace App\Console\Commands\Trial;

use App\Exports\Trial\UserCsvExport as TrialUserCsvExport;
use App\Support\Console\Commands\ExportCommand;

class UsersExportCommand extends ExportCommand
{
    protected function exportClass(): string
    {
        return TrialUserCsvExport::class;
    }
}
