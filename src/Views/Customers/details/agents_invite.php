<?php

use SRC\helper\SESSION;
use SRC\helper\URL;
?>
<div>
    <h3>Link mời đại lý cấp dưới</h3>

    <h4 id="invite_url"></h4>
</div>

<script>
    const url = new URL(window.location.href);

    let invite_url = new URL(url.origin + '<?= WEBROOT ?>saleAgents/invite');
    invite_url.searchParams.set('superior_agent', "<?= URL::base64_encode_url(SESSION::get('customers', 'email')) ?>")

    $('#invite_url').text(invite_url);
</script>