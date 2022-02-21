<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> 
	<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/flowbite@1.3.4/dist/datepicker.js"></script>
</head>
<body>
	<header>
	<nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
		<div class="flex flex-wrap items-center">
			<div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
				<h2 class="font-bold uppercase text-gray-600">Dashboard</h2>
			</div>

			<div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
				<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
						Add Partner
						</button>
			</div>

			<div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
				<ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
					<li class="flex-1 md:flex-none md:mr-3">
						<div date-rangepicker class="flex items-center">
							
							<div class="relative">
								<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
									<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
								</div>
								<input name="start" id="start_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
							</div>

							<span class="mx-4 text-gray-500">to</span>

							<div class="relative">
								<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
									<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
								</div>
								<input name="end"  id="end_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
							</div>

						</div>

						<div date-rangepicker class="flex items-center mt-1">
							
							<div class="relative">
								<button class="filter-data-wrap block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" >
							Apply Filter
							</button>
							</div>

							<span class="mx-4 text-gray-500"> </span>
							<div class="relative">
								<button class="clear-filter-data-wrap block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 	focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" >
							Clear Filter
							</button>
							</div>

						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	</header>

	<section class="mt-20">
		<div id="main" class="main-content flex-1 bg-gray-100 mt-20 md:mt-2 pb-24 md:pb-5 pt-10">
			<div class="flex flex-wrap">
				<div class="w-full md:w-1/2 xl:w-1/3 p-6">
					<!--Metric Card-->
					<div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="rounded-full p-5 bg-blue-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Total Partners</h2>
								<p class="font-bold text-3xl"><?php echo $partners; ?></p>
							</div>
						</div>
					</div>
					<!--/Metric Card-->
				</div>
				<div class="w-full md:w-1/2 xl:w-1/3 p-6">
					<!--Metric Card-->
					<div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
						<div class="flex flex-row items-center">
							<div class="flex-shrink pr-4">
								<div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
							</div>
							<div class="flex-1 text-right md:text-center">
								<h2 class="font-bold uppercase text-gray-600">Total Api Request</h2>
								<p class="font-bold text-3xl total-api-request-all-data"><?php echo $total_api_request_count; ?></p>
							</div>
						</div>
					</div>
					<!--/Metric Card-->
				</div>
				<div class="w-full md:w-1/2 xl:w-1/3 p-6">
					
				</div>
				<?php
				if(!empty($all_partners)){
					foreach($all_partners as $all_partnersi){
						?>
							<div class="w-full md:w-1/2 xl:w-1/3 p-6">
								<div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
									<div class="flex flex-row items-center">
										<div class="flex-shrink pr-4">
											<div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
										</div>
										<div class="flex-1 text-right md:text-center">
											<h2 class="font-bold uppercase text-gray-600"><?= $all_partnersi['name'].' API Request' ?></h2>
											<p class="font-bold text-3xl partner-list-data-wrap-<?php echo $all_partnersi['id']; ?>"><?php echo $all_partnersi['api_request_count']; ?></p>
											<button class=" content-end block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal<?=  $all_partnersi['id'];?>">View</button>
										</div>
									</div>
								</div>
							</div>

							<!-- model -->
							<div id="defaultModal<?=  $all_partnersi['id'];?>" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
								<div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
									<!-- Modal content -->
									<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
										<!-- Modal header -->
										<div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
											<h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
												Partner Detail
											</h3>
											<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal<?=  $all_partnersi['id'];?>">
												<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
											</button>
										</div>
										<!-- Modal body -->
										<div class="p-6 space-y-6">
											<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
												Partner Name : <?= $all_partnersi['name'];?>
											</p>
											<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
												Partner Email : <?= $all_partnersi['email'];?>
											</p>
											<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
												Partner Access Key : <?= $all_partnersi['api_access_key'];?>
											</p>
										</div>
									</div>
								</div>
							</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</section>

<!-- Main modal -->
<div id="authentication-modal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" action="#">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Partner</h3>
				<p class="form-error-wrap"></p>
				<div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Name" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Email" required>
                </div>
                <button type="button" class="add-partner-wrap w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Partner</button>
            </form>
        </div>
    </div>
</div> 

<!-- Delete Product Modal -->
<!-- Modal toggle -->
<button style="display:none" class="error-popup-model-wrap block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="popup-modal">
  Toggle modal
</button>

<!-- Delete Product Modal -->
<div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="popup-modal">
    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-end p-2">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 pt-0 text-center">
                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Start date & End date is required</h3>
                
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Close</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script>
/** call onload function */
$(function(){

	/** Clear Filter data */
	$(document).on('click','.clear-filter-data-wrap', function(){
		location.reload();
	});
	/** Filter data on click event */
	$(document).on('click','.filter-data-wrap', function(){

		if($("#start_date").val() =='' && $("#end_date").val() ==''){
			$(document).find('.error-popup-model-wrap ').click();
			return false;
		}
		/** Create form data in variable */
		let userdata = {
			start_date : $("#start_date").val(),
			end_date: $("#end_date").val(),
		}
		$.ajax({
			method:"POST",
			url: "<?php echo BASE_URL ?>filter-data",
			data: userdata,
			success: function(data){

				/** parse data to json */
				let success_data = JSON.parse(data);
				var  partnerdata = success_data.data;
				jQuery.each( partnerdata, function( i, val ) {
					$(document).find('.partner-list-data-wrap-'+val.id).text(val.total_request);
				});
				$(document).find('.total-api-request-all-data').text(partnerdata.total_api_request);
			}
		});
	});

	/** Add partner button on click event */
	$(document).on('click','.add-partner-wrap', function(){

		/** Create form data in variable */
		let userdata = {
			name : $("#name").val(),
			email: $("#email").val(),
		}

		/** Call the ajax request and insert data in the record */
		$.ajax({
			method:"POST",
			url: "<?php echo BASE_URL ?>add-partner",
			data: userdata,
			success: function(data){

				/** parse data to json */
				let success_data = JSON.parse(data);

				/** Check staus true or false */
				if(success_data.status == true){

					/** Reload the page */
					location.reload();

				} else {

					/** Show the error message */
					$(document).find('.form-error-wrap').text(success_data.message).css('color', 'red');

				}
			}
		});
	});
	
});
</script>
