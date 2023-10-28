<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <div class="bg-green-100 p-8">
    <h1 class="text-4xl font-bold underline text-center">
      Veg Planner 
    </h1>
    <div class="flex mt-10 p-8 justify-between">
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('family.index') }}">family</a>
      </div>
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('plantType.index') }}">plant type</a>
      </div>
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('variety.index') }}">variety</a>
      </div>
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('succession.index') }}">succession</a>
      </div>
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('journal.index') }}">journal</a>
      </div>
      <div class="">
        <a class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400"
              href="{{ route('succession.sowtoday') }}">sow today</a>
      </div>
    </div>
  </div>
</body>
</html>