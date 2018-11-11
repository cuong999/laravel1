<?php $__env->startSection('content'); ?>
    <h3 class="form-title font-green"><?php echo e(trans('core.acl::auth.login_title')); ?></h3>
    <div class="content-wrapper">
        <?php echo Form::open(['route' => 'access.login', 'class' => 'login-form']); ?>

            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span></span>
            </div>
            <div class="form-group">
                <label class="control-label"><?php echo e(trans('core.acl::auth.login.username')); ?></label>
                <?php echo Form::text('username', old('username', app()->environment('demo') ? 'botble' : null), ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => trans('core.acl::auth.login.username')]); ?>

            </div>

            <div class="form-group">
                <label class="control-label"><?php echo e(trans('core.acl::auth.login.password')); ?></label>
                <?php echo Form::input('password', 'password', (app()->environment('demo') ? '159357' : null), ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => trans('core.acl::auth.login.password')]); ?>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label>
                            <?php echo Form::checkbox('remember', 1, null, ['class' => 'styled']); ?> <?php echo e(trans('core.acl::auth.login.remember')); ?>

                        </label>
                    </div>
                    <div class="col-6 text-right">
                        <a class="lost-pass-link" href="<?php echo e(route('access.password.request')); ?>" title="<?php echo e(trans('core.acl::auth.forgot_password.title')); ?>"><?php echo e(trans('core.acl::auth.lost_your_password')); ?></a>
                    </div>
                </div>
            </div>

            <div class="form-group form-actions">
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> <?php echo e(trans('core.acl::auth.login.login')); ?></button>
            </div>

            <?php echo apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, 'core/acl'); ?>


        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.acl::auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>