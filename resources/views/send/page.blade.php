<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Loading Spinner Styles */
        .loading-spinner {
            display: inline-block;
            border: 3px solid transparent;
            border-radius: 50%;
            border-top: 3px solid white;
            width: 16px;
            height: 16px;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-500 to-gray-800 flex items-center justify-center min-h-screen text-white">
    <div class="bg-transparent shadow-md rounded-lg p-6 w-full max-w-lg">
        <!-- Pop-up -->
        @if(session('success'))
            <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-gray-800 p-6 rounded-lg shadow-md text-center">
                    <p class="text-gray-200 font-bold">{{ session('success') }}</p>
                    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" onclick="closePopup()">Close</button>
                </div>
            </div>
        @endif

        <!-- Header -->
        <div class="flex flex-col items-center justify-center gap-5">
            <img class="size-40 rounded-2xl" src="laramail-red.jpg" alt="LaraMail Image">
            <div class="bg-red-500 text-white text-center py-4 px-24 rounded-md">
                <h1 class="text-2xl font-bold">Welcome to {{config('app.name')}}</h1>
            </div>
        </div>
        <br>
        <h2 class="text-2xl font-semibold text-gray-100 mb-4">Send Email</h2>

        <!-- Form -->
        <form action="{{ route('sendEmail') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Recipient Email -->
            <div class="mb-4">
                <label for="recipient" class="block text-gray-100 font-medium mb-2">Recipient Email</label>
                <input 
                    type="email" 
                    name="recipient" 
                    class="w-full border bg-transparent border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Enter recipient's email"
                    required>
            </div>

            <!-- Email Subject -->
            <div class="mb-4">
                <label for="subject" class="block text-gray-100 font-medium mb-2">Subject</label>
                <input 
                    type="text"
                    name="subject" 
                    class="w-full border bg-transparent border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Enter email subject"
                    required>
            </div>

            <!-- Email Body -->
            <div class="mb-4">
                <label for="body" class="block text-gray-100 font-medium mb-2">Email Content</label>
                <textarea 
                    name="body" 
                    rows="6"
                    class="w-full border bg-transparent border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Write your email content here..."
                    required></textarea>
            </div>

            <!-- Contact Info -->
            <div class="mb-4">
                <label for="recipient" class="block text-gray-100 font-medium mb-2">Contact Info</label>
                <input 
                    type="text" 
                    name="contact_info" 
                    class="w-full border bg-transparent border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="Enter your address (link) | Optional">
            </div>

            <!-- File Attachment -->
            <div class="mb-4">
                <label for="attachment" class="block text-gray-100 font-medium mb-2">Attachment</label>
                <input 
                    type="file" 
                    name="attachment" 
                    class="w-full bg-transparent border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.ppt,.pptx,.xls">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-red-500 text-white font-medium px-6 py-2 rounded-lg flex items-center justify-center hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                    id="submitButton">
                    <span class="loading-spinner hidden" id="loadingSpinner"></span>
                    <span id="buttonText">Send Email</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Script -->
    <script>
        const form = document.getElementById('emailForm');
        const submitButton = document.getElementById('submitButton');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const buttonText = document.getElementById('buttonText');

        form.addEventListener('submit', function (e) {
            // Show loading spinner and disable the button
            loadingSpinner.classList.remove('hidden');
            buttonText.textContent = "Sending...";
            submitButton.setAttribute('disabled', true);
        });

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
