<style>
    .login-row {
        min-width: 432px;
        width: fit-content;
        margin: 0 auto;
        box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
        margin-bottom: 30px;
    }

    .login-row .panel {
        padding: 16px;
    }

    .new-customer .panel-header .panel-title {
        font-size: 25px;
        line-height: 32px;
        color: #1c1e21;

        line-height: 38px;
        margin-bottom: 0;
    }

    .panel-title-text {
        font-size: 15px;
        line-height: 24px;
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        padding: 0;
    }

    .avatar {
        width: 150px;
        height: 150px;
        cursor: pointer;
        background-image: url("<?= PUBLIC_URL ?>upload/customers/default_customer_image.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 50%;
        position: relative;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        transform: translate(0px, -61px);
        box-sizing: border-box;
        background-position: center;
        z-index: 999;
        transform-style: preserve-3d;
        box-shadow: 0 2px 4px rgb(0 0 0 / 20%), 0 8px 16px rgb(0 0 0 / 20%);
        border: 5px solid #fff;

    }

    .avatar input {
        width: 100%;
        height: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .avatar::before {
        content: '';
        width: 41px;
        height: 41px;
        position: absolute;
        bottom: -4px;
        right: -1px;
        font-size: 23px;
        background-color: #F0F2F5;
        border-radius: 50%;
        text-align: center;
        align-items: center;
        line-height: 41px;
        z-index: -1;
    }


    .login-row.row {
        margin-top: 60px;
    }

    .panel-body {
        margin-top: -43px;
    }

    .login-form {
        padding-top: 0;
        margin: 0;
    }
</style>
<div class="login-row row">
    <form class="login-form form " action="#" method="post" enctype="multipart/form-data">
        <div class="new-customer">
            <div class="panel">
                <div class="">
                    <div style="height: fit-content;margin-top: 17px;text-align: center;">
                        <h4 class="panel-title">Bạn có muốn làm đại lý</h4>
                        <?php if (isset($superior_agent)) : ?>
                            <h4>Dưới quyền <?= $superior_agent->getName() ?></h4>
                        <?php endif; ?>
                        <div class="panel-title-text">Để nhận được lợi nhuận khi bán được sản phẩm.</div>
                    </div>

                </div>
                <div style="width: fit-content;margin: 15px auto;">
                    <input name="ok" class="btn btn-primary btn-subcribe" type="submit" value="Có">
                    <a href="<?= WEBROOT ?>" class="btn btn-primary btn-subcribe">Không</a>
                </div>

            </div>
        </div>
    </form>
</div>
</div>