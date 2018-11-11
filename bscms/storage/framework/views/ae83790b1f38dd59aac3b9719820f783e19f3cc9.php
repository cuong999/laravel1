<?php if($histories->count() > 0): ?>
<div class="scroller">
    <ul class="item-list padding">
        <?php $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo $__env->make('plugins.audit-log::activity-line', compact('history'), \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<div class="widget_footer">
    <?php echo $__env->make('core.dashboard::partials.paginate', ['data' => $histories, 'limit' => $limit], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php else: ?>
    <?php echo $__env->make('core.dashboard::partials.no-data', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
