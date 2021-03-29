<x-app-layout>
    <div class="flex flex-row flex-1">
        <div class="flex-1 app-container flex flex-col">
            <div class="flex flex-col flex-1">

                <!-- Header -->
                <div class="flex flex-row items-center flex-1 space-x-8 p-3">
                    <img src="/img/pendo_logo.png"/>
                    <h1 class="text-2xl font-bold text-primary">Complaint Tracker</h1>
                    <div class="my-2 flex-1">
                        <input id="search-input" name="search" type="text" required placeholder="Search"/>
                    </div>
                    <button type="button" x-data="{}" @click="$dispatch('complaint')"
                            class="bg-green-500 uppercase rounded-xl h-12 text-white font-bold text-xl px-6">Add
                        Complaint
                    </button>
                </div>

                <!-- Table -->
                <div class="flex-1 scroll">
                    <table id="example" class="display" style="width:100%">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-file-complaint></x-file-complaint>
</x-app-layout>
