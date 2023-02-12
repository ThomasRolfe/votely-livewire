<div>
    {{ $slot }}
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tabs', () => ({
            selectedTab: null,

            selectTab(tabName) {
                selectedTab = tabName;
            }
        }))
    })
</script>

{{--<div class="{{ $class }}">--}}
{{--    <div class="sm:hidden">--}}
{{--        <label htmlFor="tabs" class="sr-only">--}}
{{--            Select a tab--}}
{{--        </label>--}}
{{--        <select--}}
{{--            id="tabs"--}}
{{--            name="tabs"--}}
{{--            class="block w-full rounded-md border-gray-300 capitalize focus:border-blue-500 focus:ring-blue-500"--}}
{{--            onChange={(e) => handleSelect(e.target.value)}--}}
{{--            defaultValue={selectedTab}--}}
{{--            >--}}
{{--            {items.map((tab) => {--}}
{{--                return (--}}
{{--                    <option value={tab.label} key={tab.label}>--}}
{{--                        {tab.label}--}}
{{--                    </option>--}}
{{--                )--}}
{{--            })}--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="hidden sm:block">--}}
{{--        <nav class="flex space-x-4" aria-label="Tabs">--}}
{{--            {items.map((tab) => (--}}
{{--            <button--}}
{{--                key={tab.label}--}}
{{--                class={classs(--}}
{{--                tab.current--}}
{{--                ? 'bg-blue-100 text-blue-700'--}}
{{--            : 'text-gray-500 hover:text-gray-700',--}}
{{--            'rounded-md px-3 py-2 text-sm font-medium capitalize'--}}
{{--            )}--}}
{{--            onClick={(e) => {--}}
{{--            handleSelect(tab.label)--}}
{{--            }}--}}
{{--            >--}}
{{--            {tab.label}--}}
{{--            </button>--}}
{{--            ))}--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</div>--}}
