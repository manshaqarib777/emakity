<div class='btn-group btn-group-sm'>
    <?php if(in_array($id,$myReviews)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('marketReviews.show')): ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.view_details')); ?>" href="<?php echo e(route('marketReviews.show', $id)); ?>" class='btn btn-link'>
                <i class="fa fa-eye"></i> </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('marketReviews.edit')): ?>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.market_review_edit')); ?>" href="<?php echo e(route('marketReviews.edit', $id)); ?>" class='btn btn-link'>
                <i class="fa fa-edit"></i> </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('marketReviews.destroy')): ?>
            <?php echo Form::open(['route' => ['marketReviews.destroy', $id], 'method' => 'delete']); ?>

            <?php echo Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-link text-danger',
            'onclick' => "return confirm('Are you sure?')"
            ]); ?>

            <?php echo Form::close(); ?>

        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/food/resources/views/market_reviews/datatables_actions.blade.php ENDPATH**/ ?>