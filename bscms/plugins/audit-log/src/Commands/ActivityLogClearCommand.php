<?php

namespace Bytesoft\AuditLog\Commands;

use Bytesoft\AuditLog\Repositories\Interfaces\AuditLogInterface;
use Illuminate\Console\Command;

class ActivityLogClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:activity-logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all activity logs';

    /**
     * @var AuditLogInterface
     */
    protected $auditLogRepository;

    /**
     * RebuildPermissions constructor.
     * @author Bytesoft
     * @param AuditLogInterface $auditLogRepository
     */
    public function __construct(AuditLogInterface $auditLogRepository)
    {
        parent::__construct();
        $this->auditLogRepository = $auditLogRepository;
    }

    /**
     * Execute the console command.
     * @author Bytesoft
     * @throws \Throwable
     */
    public function handle()
    {
        $this->info('Processing...');
        $count = $this->auditLogRepository->count();
        $this->auditLogRepository->getModel()->truncate();
        $this->info('Done. Deleted ' . $count . ' records!');

    }
}
