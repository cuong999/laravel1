    <div class="form">
           <?php echo Form::open(['route '=> 'public.send.contact', 'method' => 'POST']); ?>

            <?php if(session()->has('success_msg') || session()->has('error_msg') || isset($errors)): ?>
                <?php if(session()->has('success_msg')): ?>
                    <div class="alert alert-success">
                        <p><?php echo e(session('success_msg')); ?></p>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('error_msg')): ?>
                    <div class="alert alert-danger">
                        <p><?php echo e(session('error_msg')); ?></p>
                    </div>
                <?php endif; ?>
                <?php if(isset($errors) && count($errors)): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="bs-row row-md-15">
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="<?php echo e(trans('plugins.contact::contact.form_subject')); ?>"
                           value="<?php echo e(old('subject')); ?>" data-aos="fade-down" data-aos-delay="200">
                </div>
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="<?php echo e(trans('plugins.contact::contact.form_name')); ?>"
                           value="<?php echo e(old('name')); ?>" data-aos="fade-left" data-aos-delay="400">
                </div>
                <div class="bs-col md-100-15">
                    <input type="text" placeholder="<?php echo e(trans('plugins.contact::contact.form_email')); ?>"
                           value="<?php echo e(old('email')); ?>" data-aos="fade-right" data-aos-delay="400">
                </div>
                <div class="bs-col md-100-15">
                    <textarea name="" id="" cols="30" rows="10"
                              placeholder="<?php echo e(trans('plugins.contact::contact.form_content')); ?>"
                              value="<?php echo e(old('content')); ?>" data-aos="fade-up" data-aos-delay="600"></textarea>
                </div>
                <?php if(setting('enable_captcha')): ?>
                    <div class=" bs-col md-100-15">
                        <div class="form-group">
                            <label for="contact_robot"
                                   class="control-label required"><?php echo e(trans('plugins.contact::contact.confirm_not_robot')); ?></label>
                            <?php echo Captcha::display('captcha'); ?>

                            <?php echo Captcha::script(); ?>

                        </div>
                    </div>

                <?php endif; ?>
                <div class="bs-col md-100-15">
                    <button type="submit" data-aos="fade-up"
                            data-aos-delay="800"><?php echo e(trans('plugins.contact::contact.send_btn')); ?></button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
