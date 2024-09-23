// const sideBar = document.getElementById('side_bar')
// document.getElementById('burger').addEventListener('click',() =>{
//       sideBar.classList.toggle('active')
// })
//

$(document).ready(function (){
      //create event for Select Branch
      $('#Select_monthly_and_yearSales').change(function (event){
      // Create Ajax request past branch name
            $.ajax({
                  url:"../Models/Generate_past_month_current_month_sales.php",
                  type: 'POST',
                  data:{Branch: event.target.value},
                  success: function (res){
                        $('#container_box_').html(res)
                  }
            })
      })
})


$(document).ready(function (){
     $('#btn_sub').on('click',function (){
           const Data = {
                 year: $('#year').val(),
                 month: $('#date').val()
           }

           $.ajax({
                 url: '../Models/Genearete_best_Seller_of_month.php',
                 type: "POST",
                 data: Data,
                 success: function (res,status){
                      $('#Table_container').html(res)
                 }
           })

     })
})