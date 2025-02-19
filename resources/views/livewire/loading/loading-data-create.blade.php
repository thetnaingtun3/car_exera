@section('loading-active', 'bg-gray-100 group')

<section class="py-1 bg-blueGray-50">
    <div class="w-full px-6 mx-auto mt-6 ">

        <div class="relative flex flex-col w-full min-w-0 mb-6 break-words border-0 rounded-lg shadow-lg bg-blueGray-100">
            <div class="px-6 py-6 mb-0 text-white rounded-t bg-gradient-to-r from-blue-800 to-gray-800">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold">
                        Loading Data Import
                    </h6>
                </div>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10 ">
                <div class="w-full px-4 mt-5">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded" id="excel-template-download">Excel Template Download</button>
                </div>

                <!-- Regular HTML Form -->
                <form id="csv-upload-form" enctype="multipart/form-data">
                    <div class="flex flex-wrap mt-8">
                        <div class="w-full px-4 mt-5">
                            <div id="loading-message" style="display:none;">Uploading...</div>
                            <label for="csv-file" class="block text-gray-700">Excel File</label>
                            <input type="file" id="csv-file" name="csv_file" class="border p-2 rounded mt-2" />
                            <div id="file-error" class="text-red-500 mt-2"></div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8 space-x-2">
                        <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded" onclick="window.location.href='/loading/data'">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded" id="submit-btn">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('csv-upload-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission

        const formData = new FormData();
        const fileInput = document.getElementById('csv-file');
        const file = fileInput.files[0];

        if (!file) {
            document.getElementById('file-error').textContent = 'Please select a file.';
            return;
        }

        // Show loading message
        document.getElementById('loading-message').style.display = 'block';

        formData.append('csv_file', file);

        // Using the route helper to get the correct URL
        const apiUrl = "{{ route('api.csvdata') }}";  // This will output the correct URL for the 'csvdata' API

        // Perform the API request using Fetch
        fetch(apiUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Hide loading message
            document.getElementById('loading-message').style.display = 'none';

            if (data.message === 'CSV uploaded and data stored successfully') {
                // Redirect to /loading/data if success
                window.location.href = '/loading/data';
            } else {
                // Handle error if any
                document.getElementById('file-error').textContent = 'Error: ' + data.error;
            }
        })
        .catch(error => {
            // Hide loading message on error
            document.getElementById('loading-message').style.display = 'none';
            document.getElementById('file-error').textContent = 'An error occurred. Please try again.';
        });
    });
</script>