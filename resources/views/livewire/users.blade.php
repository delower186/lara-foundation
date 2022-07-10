<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg shadow-sm">
            <div class="mb-2 float-right">
                <x-jet-button>{{ __('Add New') }}</x-jet-button>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-left text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Age</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold text-black">Sufyan</p>
                              <p class="text-xs text-gray-600">Developer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border">22</td>
                        <td class="px-4 py-3 text-xs border">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 text-sm border">6/4/2000</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold text-black">Stevens</p>
                              <p class="text-xs text-gray-600">Programmer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-md font-semibold border">27</td>
                        <td class="px-4 py-3 text-xs border">
                          <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-gray-100 rounded-sm"> Pending </span>
                        </td>
                        <td class="px-4 py-3 text-sm border">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Nora</p>
                              <p class="text-xs text-gray-600">Designer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-md font-semibold border">17</td>
                        <td class="px-4 py-3 text-xs border">
                          <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> Nnacceptable </span>
                        </td>
                        <td class="px-4 py-3 text-sm border">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Ali</p>
                              <p class="text-xs text-gray-600">Programmer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">23</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Khalid</p>
                              <p class="text-xs text-gray-600">Designer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">20</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-sm"> Pending </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Nasser</p>
                              <p class="text-xs text-gray-600">Pen Tester</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">29</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Mohammed</p>
                              <p class="text-xs text-gray-600">Web Designer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">38</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Saad</p>
                              <p class="text-xs text-gray-600">Data</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">19</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                      <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                          <div class="flex items-center text-sm">
                            <div class="relative w-8 h-8 mr-3 rounded-full">
                              <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                              <p class="font-semibold">Sami</p>
                              <p class="text-xs text-gray-600">Developer</p>
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 border text-md font-semibold">21</td>
                        <td class="px-4 py-3 border text-xs">
                          <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Acceptable </span>
                        </td>
                        <td class="px-4 py-3 border text-sm">6/10/2020</td>
                      </tr>
                    </tbody>
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                          <th class="px-4 py-3">Name</th>
                          <th class="px-4 py-3">Age</th>
                          <th class="px-4 py-3">Status</th>
                          <th class="px-4 py-3">Date</th>
                        </tr>
                      </thead>
                  </table>
                </div>
              </div>
        </div>
    </div>
</div>
