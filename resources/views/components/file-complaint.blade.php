<div x-data="fileComplaint()" x-on:complaint.window="visible = !visible" x-cloak class="fixed z-10 inset-0 overflow-y-auto" x-show="visible" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!--
          Background overlay, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" :class="{'ease-out duration-300 opacity-0': !visible, 'ease-in duration-200 opacity-100':visible}" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!--
          Modal panel, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <form method="POST" action="/complaints" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             :class="{'ease-out duration-300 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95': !visible, 'ease-in duration-200 opacity-100 translate-y-0 sm:scale-100':visible}">
            @csrf
            <div class="bg-primary px-4 py-5 border-b border-gray-200 sm:px-6">
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-white">
                            Add Complaint
                        </h3>
                    </div>
                </div>
            </div>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="grid grid-cols-6 gap-6 flex-1">
                        <div class="col-span-12">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </div>
                        <div class="col-span-6">
                            <x-datepicker></x-datepicker>
                        </div>

                        <div class="col-span-6">
                            <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name</label>
                            <input type="text" required name="client_name" id="client_name" value="{{old('client_name')}}" autocomplete="client-name" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Complaint Type</label>
                            <select id="type" required name="type" autocomplete="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @foreach(\App\Models\Complaint::getTypes() as $type => $label)
                                    <option value="{{$type}}">{{$label}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-4">
                            <label for="person" class="block text-sm font-medium text-gray-700">Complaint Person</label>
                            <select id="person" required name="person" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @foreach(\App\Models\Complaint::getPersons() as $person => $label)
                                    <option value="{{$person}}">{{$label}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-4">
                            <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                            <select id="job_title" required name="job_title" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                @foreach(\App\Models\Complaint::getJobs() as $job => $label)
                                    <option value="{{$job}}">{{$label}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-12">
                            <label for="author" class="block text-sm font-medium text-gray-700">Complaint Person Name</label>
                            <input type="text" name="author" id="author" autocomplete="author" value="{{old('author')}}" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>



                        <div class="col-span-12">
                            <label for="message" class="block text-sm font-medium text-gray-700">Complaint</label>
                            <textarea rows="10" name="message" id="message" autocomplete="off" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{old('complaint')}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Submit
                </button>
                <button type="button" @click="toggleVisible()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function fileComplaint() {
        return {
            visible: {{$errors->count()}},

            toggleVisible() {
                this.visible = !this.visible
            }
        }
    }
</script>
