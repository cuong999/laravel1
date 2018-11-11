<?php if($requests->count() > 0): ?>
<div class="scroller">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(trans('core.base::tables.url')); ?></th>
                <th><?php echo e(trans('plugins.request-log::request-log.status_code')); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->index + 1); ?></td>
                <td><a href="<?php echo e($request->url); ?>" target="_blank"><?php echo e(str_limit($request->url, 80)); ?></a></td>
                <td><?php echo e($request->status_code); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="widget_footer">
    <?php echo $__env->make('core.dashboard::partials.paginate', ['data' => $requests, 'limit' => $limit], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php else: ?>
    <?php echo $__env->make('core.dashboard::partials.no-data', ['message' => trans('plugins.request-log::request-log.no_request_error')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>