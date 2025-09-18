<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage Booking Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen font-sans">

<div class="w-full max-w-lg p-8 bg-gray-800 shadow-lg rounded-lg">
    <h2 class="text-3xl text-white font-bold underline text-center mb-6">
        Garage Booking Form
    </h2>

    <form method="POST" action="mail.php" class="space-y-4">
        
        <!-- Name -->
        <div>
            <label class="block text-gray-200">Full Name</label>
            <input type="text" name="name" required
                   class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
        </div>
        
        <!-- Email -->
        <div>
            <label class="block text-gray-200">Email</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
        </div>

        <!-- Phone -->
        <div>
            <label class="block text-gray-200">Phone Number</label>
            <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="07XXXXXXXX"
                   class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
        </div>

        <!-- Vehicle -->
        <div>
            <label class="block text-gray-200">Vehicle Model</label>
            <input type="text" name="vehicle" required
                   class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
        </div>

        <!-- Date & Time -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-200">Preferred Date</label>
                <input type="date" name="date" required
                       class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
            </div>
            <div>
                <label class="block text-gray-200">Preferred Time</label>
                <input type="time" name="time" required
                       class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white">
            </div>
        </div>

        <!-- Notes -->
        <div>
            <label class="block text-gray-200">Additional Notes</label>
            <textarea name="notes" rows="3"
                      class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-700 text-white"
                      placeholder="Any special instructions or details"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition font-bold">
                Book Now
            </button>


