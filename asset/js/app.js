$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#ultg').select2({
	  	placeholder: 'Pilih ULTG',
	  	language: "id_ultg"
	});
	$('#tt').select2({
	  	placeholder: 'Pilih Transmisi Trafo',
	  	language: "id_tt"
   });
   $('#status_gg').select2({
      placeholder: 'Pilih Status Gangguan',
      language: "id_status"
   });

	//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#ultg").change(function(){
	      $("img#load1").show();
	      var id_ultg = $(this).val(); 
	      $.ajax({
	         type: "POST",
            dataType: "html",
	         url: "module/gangguan/proses.php?jenis=tt",
	         data: "id_ultg="+id_ultg,
	         success: function(msg){
	            $("select#tt").html(msg);                                                       
	            $("img#load1").hide();
	            getAjaxtt();                                                        
	         }
	      });                    
     });  

	$("#tt").change(getAjaxtt);
     function getAjaxtt(){
          $("img#load2").show();
          var id_tt = $("#tt").val();
          $.ajax({
             type: "POST",
             dataType: "html",
             url: "module/gangguan/proses.php?jenis=status_gg",
             data: "id_tt="+id_tt,
             success: function(msg){
                $("select#status_gg").html(msg);                              
                $("img#load2").hide(); 
             }
          });
     }

   //   $("#tt").change(getAjaxtt);
   //   function getAjaxtt(){
   //        $("img#load3").show();
   //        var id_tt = $("#tt").val();
   //        $.ajax({
   //           type: "POST",
   //           dataType: "html",
   //           url: "data-wilayah.php?jenis=kelurahan",
   //           data: "id_district="+id_district,
   //           success: function(msg){
   //              $("select#kelurahan").html(msg);                              
   //              $("img#load3").hide();                                                 
   //           }
   //        });
   //   }
});