<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-navigation></x-navigation>
    <!-- Form Section -->
  <div class="mx-auto bg-white p-8 rounded-lg ">
    <h2 class="text-2xl font-bold mb-6">Add New Course</h2>
    <form>
      <!-- Course Name -->
      <div class="mb-4">
        <input type="text" placeholder="Course Name"
               class="w-full p-3 rounded bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-300">
      </div>
      <!-- Lecturer's Name -->
      <div class="mb-4">
        <input type="text" placeholder="Lecturer's Name"
               class="w-full p-3 rounded bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-300">
      </div>
      <!-- Day -->
      <div class="mb-4">
        <input type="text" placeholder="Day"
               class="w-full p-3 rounded bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-300">
      </div>
      <!-- Time -->
      <div class="mb-4">
        <input type="text" placeholder="Time"
               class="w-full p-3 rounded bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-300">
      </div>
      <!-- Group Link -->
      <div class="mb-6">
        <input type="text" placeholder="Group Link"
               class="w-full p-3 rounded bg-orange-50 focus:outline-none focus:ring-2 focus:ring-orange-300">
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full py-3 bg-orange-400 text-white font-semibold rounded hover:bg-orange-500 focus:outline-none">
        SUBMIT
      </button>
    </form>
  </div>

</body>
</html>