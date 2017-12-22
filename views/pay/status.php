<div class="container">
    <div class="" style="width: 100%;margin: 0 auto;text-align: center;height: 300px;line-height: 300px;">
        <?php if($status == 'ok'): ?>
            <p style="color: green;"><i class="fa fa-check-square">支付成功</i></p>
            <?php else: ?>
            <p style="color: red;"><i class="fa fa-check-square">支付失败</i></p>
        <?php endif; ?>
    </div>
</div>