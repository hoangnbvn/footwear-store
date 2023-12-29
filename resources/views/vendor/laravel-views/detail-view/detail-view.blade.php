<x-lv-layout>
  <div class="flex items-center px-4 mb-4">
    <div class="flex-1">
      <div class="text-2xl font-bold text-gray-900">
        {{ __($title) }}
      </div>
      @isset ($subtitle)
        <span class="text-sm">{{ __($subtitle) }}</span>
      @endisset
    </div>

    <div class="flex justify-end">
      <x-lv-actions :actions="$this->actions" :model="$model" />
    </div>
  </div>

  @foreach ($components as $component)
    <div class="mb-4">
      {!! __($component) !!}
    </div>
  @endforeach
</x-lv-layout>
