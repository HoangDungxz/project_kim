 <div class="page-wrapper">

     <div class="content container-fluid">
         <!-- Page Header -->
         <div class="page-header">
             <div class="row">
                 <div class="col-12">
                     <!-- <h3 class="page-title">Xin chào Vũ Kim Anh!</h3> -->
                 </div>
             </div>
         </div>
         <!-- /Page Header -->

         <div class="row ">
             <div class="col-xl-3 col-sm-6 col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="dash-widget-header">
                             <span class="dash-widget-icon bg-primary">
                                 <i class="fas fa-user-shield"></i>
                             </span>
                             <div class="dash-widget-info">
                                 <h3><?= $countUsers ?></h3>
                                 <h6 class="text-muted">Tài khoản</h6>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-sm-6 col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="dash-widget-header">
                             <span class="dash-widget-icon bg-primary">
                                 <i class="far fa-user"></i>
                             </span>
                             <div class="dash-widget-info">
                                 <h3><?= $countCustomers ?></h3>
                                 <h6 class="text-muted">Khách hàng</h6>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-sm-6 col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="dash-widget-header">
                             <span class="dash-widget-icon bg-primary">
                                 <i class="fas fa-box-open"></i>
                             </span>
                             <div class="dash-widget-info">
                                 <h3><?= $countProducts ?></h3>
                                 <h6 class="text-muted">Sản phẩm</h6>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-xl-3 col-sm-6 col-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="dash-widget-header">
                             <span class="dash-widget-icon bg-primary">
                                 <i class="fas fa-cart-plus"></i>
                             </span>
                             <div class="dash-widget-info">
                                 <h3><?= $countOrders ?></h3>
                                 <h6 class="text-muted">Đơn chưa xử lý</h6>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-xl-12 col-sm-12 col-12">
                 <div class="card">
                     <div class="card-header d-flex" style="align-items: center;">
                         <h5 class="card-title">Doanh thu</h5>
                         <div class="date-from">
                             <label for="">Từ</label>
                             <input value="<?= date("Y") ?>-01" class="proceeds" type="month" name="date_from" id="date_from">
                         </div>
                         <div class="date-to">
                             <label for="">Đến</label>
                             <input value="<?= date("Y-m") ?>" class="proceeds" type="month" name="date_to" id="date_to">
                         </div>
                     </div>
                     <div class="card-body">
                         <div>
                             <canvas id="proceedsChart"></canvas>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-xl-12 col-sm-12 col-12">
                 <div class="card">
                     <div class="card-header d-flex" style="align-items: center;">
                         <h5 class="card-title">Số sản phẩm bán ra</h5>
                         <div class="date-from">
                             <label for="">Từ</label>
                             <input value="<?= date("Y") ?>-01" class="count_products" type="month" name="date_from" id="date_products_from">
                         </div>
                         <div class="date-to">
                             <label for="">Đến</label>
                             <input value="<?= date("Y-m") ?>" class="count_products" type="month" name="date_to" id="date_product_to">
                         </div>
                     </div>
                     <div class="card-body">
                         <div>
                             <canvas id="countProductsChart"></canvas>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>


 <script>
     const months_name = [
         'January',
         'February',
         'March',
         'April',
         'May',
         'June',
         'July',
         'August',
         'September',
         'October',
         'November',
         'December',
     ];


     $(document).ready(function() {
         ajax_proceeds();
         $(document).on('change', '.proceeds', function(e) {
             ajax_proceeds();
         })
         ajax_countProducts();
         $(document).on('change', '.count_products', function(e) {
             ajax_countProducts();
         })

     })



     const labels = [

     ];

     const data_proceeds = {
         labels: [],
         datasets: [{
             label: 'Doanh thu',
             backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
             data: [],
         }]
     };

     const data_count_products = {
         labels: [],
         datasets: [{
             label: 'Sản phẩm bán ra',
             backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
             data: [],
         }]
     };


     const config = {
         type: 'line',
         data: data_proceeds,
         options: {}
     };


     function ajax_proceeds() {
         let date_from = $('#date_from').val();
         let date_to = $('#date_to').val();

         $.ajax({
             url: '<?= WEBROOT ?>admin/home/ajax_proceeds',
             type: 'POST',
             dataType: 'json',
             data: {
                 date_from: date_from,
                 date_to: date_to
             }
         }).done(function(result) {
             let labels = [];
             let datas = [];
             result?.forEach(e => {
                 labels.push(months_name[e.month - 1] + ' ' + e.year);
                 datas.push(e.sum_price);
             });

             proceedsChart.data.labels = labels;
             proceedsChart.data.datasets[0].data = datas; // or you can iterate for multiple datasets
             proceedsChart.update(); // finally update our chart

         });
     }

     function ajax_countProducts() {
         let date_from = $('#date_products_from').val();
         let date_to = $('#date_product_to').val();

         $.ajax({
             url: '<?= WEBROOT ?>admin/home/ajax_proceeds',
             type: 'POST',
             dataType: 'json',
             data: {
                 date_from: date_from,
                 date_to: date_to
             }
         }).done(function(result) {
             let labels = [];
             let datas = [];
             result?.forEach(e => {
                 labels.push(months_name[e.month - 1] + ' ' + e.year);
                 datas.push(e.sum_quantity);
             });


             countProductsChart.data.labels = labels;
             countProductsChart.data.datasets[0].data = datas; // or you can iterate for multiple datasets
             countProductsChart.update(); // finally update our chart

         });
     }
 </script>

 <script>
     const proceedsChart = new Chart(
         document.getElementById('proceedsChart'), {
             ...config,
             data: data_proceeds
         }
     );


     const countProductsChart = new Chart(
         document.getElementById('countProductsChart'), {
             ...config,
             data: data_count_products
         }
     );
 </script>