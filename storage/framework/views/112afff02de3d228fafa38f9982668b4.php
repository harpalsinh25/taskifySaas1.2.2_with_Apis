
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>
  
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header"><?= get_label('are_you_sure_you_want_to_delete_this', 'Are you sure you want to delete this?') ?></div>
              <div class="app-modal-body"><?= get_label('you_can_not_undo_this_action', 'You can not undo this action') ?></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel"><?= get_label('cancel', 'Cancel') ?></a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete"><?= get_label('yes', 'Yes') ?></a>
              </div>
          </div>
      </div>
  </div>
  
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel"><?= get_label('cancel', 'Cancel') ?></a>
              </div>
          </div>
      </div>
  </div>
  
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="update-settings" action="<?php echo e(route('avatar.update')); ?>" enctype="multipart/form-data" method="POST">
                  <?php echo csrf_field(); ?>
                  
                  <div class="app-modal-body">
                      
                      <div class="avatar av-l upload-avatar-preview chatify-d-flex"
                      style="background-image: url('<?php echo e(Chatify::getUserWithAvatar(Auth::user())->avatar); ?>');"
                      ></div>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update" style="background-color:<?php echo e($messengerColor); ?>">
                      <?= get_label('upload_new', 'Upload New') ?>
                          <input class="upload-avatar chatify-d-none" accept="image/*" name="avatar" type="file" />
                      </label>
                      
                      <p class="divider"></p>
                      <p class="app-modal-header"><?= get_label('dark_mode', 'Dark Mode') ?> <span class="
                        <?php echo e(Auth::user()->dark_mode > 0 ? 'fas' : 'far'); ?> fa-moon dark-mode-switch"
                         data-mode="<?php echo e(Auth::user()->dark_mode > 0 ? 1 : 0); ?>"></span></p>
                      
                      <p class="divider"></p>
                      <div class="update-messengerColor">
                      <?php $__currentLoopData = config('chatify.colors'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span style="background-color: <?php echo e($color); ?>" data-color="<?php echo e($color); ?>" class="color-btn"></span>
                        <?php if(($loop->index + 1) % 5 == 0): ?>
                            <br/>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a href="javascript:void(0)" class="app-btn cancel"><?= get_label('cancel', 'Cancel') ?></a>
                      <input type="submit" class="app-btn a-btn-success update" value="<?= get_label('save_changes', 'Save Changes') ?>" />
                  </div>
              </form>
          </div>
      </div>
  </div>
<?php /**PATH C:\Users\Dikshita\Desktop\Taskify-SaaS v1.2.1 - Project Mangement - Task Mangement  & Productivity Tool\saas\resources\views/vendor/Chatify/layouts/modals.blade.php ENDPATH**/ ?>