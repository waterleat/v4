<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <h1 class="text-3xl font-bold underline text-red-500">
    Hello world! 
  </h1>
  <div class="flex">
    <div class="w-20">
      <a href={{ route('family.index') }}>family</a>
    </div>
    <div class="w-24">
      <a href={{ route('plantType.index') }}>plant type</a>
    </div>
    <div class="w-20">
      <a href={{ route('variety.index') }}>variety</a>
    </div>
    <div class="w-24">
      <a href={{ route('succession.index') }}>succession</a>
    </div>
    <div class="w-20">
      <a href={{ route('journal.index') }}>journal</a>
    </div>
    <div class="w-24">
      <a href={{ route('succession.sowtoday') }}>sow today</a>
    </div>
  </div>
</body>
</html>