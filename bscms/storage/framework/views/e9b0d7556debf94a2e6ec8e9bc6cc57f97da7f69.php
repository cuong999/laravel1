<?php if($posts->count() > 0): ?>
    <div class="scroller">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th><?php echo e(trans('core.base::tables.name')); ?></th>
                <th><?php echo e(trans('core.base::tables.created_at')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td><?php if($post->slug): ?> <a href="<?php echo e(route('public.single', $post->slug)); ?>" target="_blank"><?php echo e(str_limit($post->name, 100)); ?></a> <?php else: ?> <strong><?php echo e(str_limit($post->name, 100)); ?></strong> <?php endif; ?></td>
                    <td><?php echo e(date_from_database($post->created_at, 'd-m-Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="widget_footer">
        <?php echo $__env->make('core.dashboard::partials.paginate', ['data' => $posts, 'limit' => $limit], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php else: ?>
    <?php echo $__env->make('core.dashboard::partials.no-data', ['message' => trans('plugins.blog::posts.no_new_post_now')], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>