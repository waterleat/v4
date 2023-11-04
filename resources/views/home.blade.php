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
      <x-button.large href="{{ route('family.index') }}">Family</x-button.large>
      <x-button.large href="{{ route('plantType.index') }}">Plant Type</x-button.large>
      <x-button.large href="{{ route('variety.index') }}">Variety</x-button.large>
      <x-button.large href="{{ route('succession.index') }}">Succession</x-button.large>
      <x-button.large href="{{ route('journal.index') }}">Journal</x-button.large>
      <x-button.large href="{{ route('plan.index') }}">Plan</x-button.large>
      <x-button.large href="{{ route('succession.sowtoday') }}">Sow Today</x-button.large>
    </div>
  </div>
</body>
</html>