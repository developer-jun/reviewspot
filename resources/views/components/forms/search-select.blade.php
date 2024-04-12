<label for="{{ $name }}" class="sr-only">{{ $label }}</label>
<select id="{{ $name }}" name="{{ $name }}" class="block p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Any {{ $label }}</option>
    @foreach ($options as $option)
        <option value="{{ $option->code }}" @if ($option->code == $defaultValue) selected @endif >{{ $option->name }}</option>
    @endforeach
</select>