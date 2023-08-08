<aside id="logo-sidebar" class="fixed pl-8 top-0 left-0 z-40 w-64 h-screen pt-20 pb-8 transition-transform -translate-x-full bg-rose-50 border-r border-sky-100 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full rounded-lg px-3 pb-4 overflow-y-auto bg-rose-800">
        <ul class="space-y-2 pt-4">
            
            <li>
                <a href="{{route('home.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                    <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            
            
            @if(Auth::user()->user_level == 2)
            <li>
                <a href="{{route('employees.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" height="800px" width="800px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M256.008,411.524c54.5,0,91.968-7.079,92.54-13.881c2.373-28.421-34.508-43.262-49.381-48.834 c-7.976-2.984-19.588-11.69-19.588-17.103c0-3.587,0-8.071,0-14.214c4.611-5.119,8.095-15.532,10.183-27.317 c4.857-1.738,7.627-4.524,11.095-16.65c3.69-12.93-5.548-12.5-5.548-12.5c7.468-24.715-2.357-47.944-18.825-46.246 c-11.358-19.857-49.397,4.54-61.31,2.841c0,6.818,2.834,11.92,2.834,11.92c-4.143,7.882-2.548,23.564-1.389,31.485 c-0.667,0-9.016,0.079-5.468,12.5c3.452,12.126,6.23,14.912,11.088,16.65c2.079,11.786,5.571,22.198,10.198,27.317 c0,6.143,0,10.627,0,14.214c0,5.413-12.35,14.548-19.611,17.103c-14.953,5.262-51.746,20.413-49.373,48.834 C164.024,404.444,201.491,411.524,256.008,411.524z"/> <path class="st0" d="M404.976,56.889h-75.833v16.254c0,31.365-25.524,56.889-56.889,56.889h-32.508 c-31.366,0-56.889-25.524-56.889-56.889V56.889h-75.834c-25.444,0-46.071,20.627-46.071,46.071v362.969 c0,25.444,20.627,46.071,46.071,46.071h297.952c25.445,0,46.072-20.627,46.072-46.071V102.96 C451.048,77.516,430.421,56.889,404.976,56.889z M402.286,463.238H109.714V150.349h292.572V463.238z"/> <path class="st0" d="M239.746,113.778h32.508c22.405,0,40.635-18.23,40.635-40.635V40.635C312.889,18.23,294.659,0,272.254,0 h-32.508c-22.406,0-40.635,18.23-40.635,40.635v32.508C199.111,95.547,217.341,113.778,239.746,113.778z M231.619,40.635 c0-4.492,3.634-8.127,8.127-8.127h32.508c4.492,0,8.127,3.635,8.127,8.127v16.254c0,4.492-3.635,8.127-8.127,8.127h-32.508 c-4.493,0-8.127-3.635-8.127-8.127V40.635z"/> </g> </g>
                </svg>  
                <span class="flex-1 ml-3 whitespace-nowrap">Biodata Karyawan</span>
                </a>
            </li>
            <li>
                <a href="{{route('employees.resigned')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" height="800px" width="800px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#ffffff;} </style> <g> <path class="st0" d="M256.008,411.524c54.5,0,91.968-7.079,92.54-13.881c2.373-28.421-34.508-43.262-49.381-48.834 c-7.976-2.984-19.588-11.69-19.588-17.103c0-3.587,0-8.071,0-14.214c4.611-5.119,8.095-15.532,10.183-27.317 c4.857-1.738,7.627-4.524,11.095-16.65c3.69-12.93-5.548-12.5-5.548-12.5c7.468-24.715-2.357-47.944-18.825-46.246 c-11.358-19.857-49.397,4.54-61.31,2.841c0,6.818,2.834,11.92,2.834,11.92c-4.143,7.882-2.548,23.564-1.389,31.485 c-0.667,0-9.016,0.079-5.468,12.5c3.452,12.126,6.23,14.912,11.088,16.65c2.079,11.786,5.571,22.198,10.198,27.317 c0,6.143,0,10.627,0,14.214c0,5.413-12.35,14.548-19.611,17.103c-14.953,5.262-51.746,20.413-49.373,48.834 C164.024,404.444,201.491,411.524,256.008,411.524z"/> <path class="st0" d="M404.976,56.889h-75.833v16.254c0,31.365-25.524,56.889-56.889,56.889h-32.508 c-31.366,0-56.889-25.524-56.889-56.889V56.889h-75.834c-25.444,0-46.071,20.627-46.071,46.071v362.969 c0,25.444,20.627,46.071,46.071,46.071h297.952c25.445,0,46.072-20.627,46.072-46.071V102.96 C451.048,77.516,430.421,56.889,404.976,56.889z M402.286,463.238H109.714V150.349h292.572V463.238z"/> <path class="st0" d="M239.746,113.778h32.508c22.405,0,40.635-18.23,40.635-40.635V40.635C312.889,18.23,294.659,0,272.254,0 h-32.508c-22.406,0-40.635,18.23-40.635,40.635v32.508C199.111,95.547,217.341,113.778,239.746,113.778z M231.619,40.635 c0-4.492,3.634-8.127,8.127-8.127h32.508c4.492,0,8.127,3.635,8.127,8.127v16.254c0,4.492-3.635,8.127-8.127,8.127h-32.508 c-4.493,0-8.127-3.635-8.127-8.127V40.635z"/> </g> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Karyawan Resign</span>
                </a>
            </li>
            <li>
                <a href="/grading" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" width="800px" height="800px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <path d="M1185.941 0c73.525 0 135.643 47.322 159.021 112.941h462.156V1920H113V112.941h462.155C598.535 47.322 660.652 0 734.176 0Zm56.47 1468.235H903.589v112.941h338.824v-112.94Zm-451.764-225.882H451.824v338.823h338.823v-338.823Zm677.647 0H903.588v112.941h564.706v-112.941ZM790.647 677.647H451.824v338.824h338.823V677.647Zm451.765 225.882H903.588v112.942h338.824V903.529Zm225.882-225.882H903.588v112.941h564.706v-112.94Zm-282.353-564.706H734.176c-31.058 0-56.47 25.299-56.47 56.47v169.413h564.706V169.412c0-31.172-25.412-56.47-56.47-56.47Z" fill-rule="evenodd"/> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Penilaian Karyawan</span>
                </a>
            </li>
            <li>
                <a href="{{route('approvalHrd.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="approve-document" class="flex-shrink-0 w-6 h-6" fill="#ffffff">
                        <path d="M13.93,27.19H5.5a1,1,0,0,1,0-2h7.74A9.87,9.87,0,0,1,13,23a9.63,9.63,0,0,1,.32-2.48H5.5a1,1,0,0,1,0-2h8.57A10,10,0,0,1,19,13.85H5.5a1,1,0,0,1,0-2h14a1,1,0,0,1,1,1,1,1,0,0,1-.14.51A9.62,9.62,0,0,1,23,13c.34,0,.67,0,1,.05V4a3,3,0,0,0-3-3H4A3,3,0,0,0,1,4V28a3,3,0,0,0,3,3H17A10,10,0,0,1,13.93,27.19ZM5.5,5.19h14a1,1,0,0,1,0,2H5.5a1,1,0,0,1,0-2Z"></path>
                        <path d="M23,15a8,8,0,1,0,8,8A8,8,0,0,0,23,15Zm3.16,7.25-3.46,3a1,1,0,0,1-.65.25,1,1,0,0,1-.66-.25l-1.55-1.34a1,1,0,0,1,1.32-1.51l.89.77,2.79-2.42a1,1,0,1,1,1.32,1.5Z"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Approval Cuti</span>
                </a>
            </li>

            @elseif(Auth::user()->user_level == 3)
            <li>
                <a href="{{route('profilKasie.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Profil</span>
                </a>
            </li>
            <li>
                <a href="{{route('cutiKasie.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <path d="M77.4,78.1H40.5c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h36.9 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6C79.8,77,78.8,78.1,77.4,78.1C77.5,78.1,77.5,78.1,77.4,78.1z"/> <path d="M26.6,78.1H22c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h4.6 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6C29,77,28,78,26.8,78.1C26.7,78.1,26.7,78.1,26.6,78.1z"/> <path d="M53.8,57.6c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h23.6 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6c0,1.2-1,2.3-2.2,2.3c0,0-0.1,0-0.1,0H53.8z"/> <path d="M62.6,37.1c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h14.8 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6c0,1.2-1,2.3-2.2,2.3c0,0-0.1,0-0.1,0H62.6z"/> <path d="M20.8,58.2C19.6,47.5,28,36.4,38,34.5l2.7-0.6c0.5-0.1,0.9-0.6,0.8-1.2c0-0.3-0.2-0.5-0.4-0.6l-6.7-4.5 c-0.7-0.5-0.8-1.4-0.3-2c0,0,0,0,0-0.1l1.7-2.5c0.4-0.7,1.4-0.9,2-0.4c0,0,0,0,0.1,0L54,33.5c0.7,0.4,0.9,1.4,0.4,2c0,0,0,0,0,0.1 l-11,16.2c-0.4,0.7-1.4,0.9-2,0.4c0,0,0,0-0.1,0l-2.5-1.7c-0.7-0.4-0.9-1.4-0.4-2c0,0,0,0,0-0.1l4.4-6.7c0.3-0.4,0.3-1.1-0.2-1.4 c-0.2-0.2-0.5-0.3-0.8-0.2l-1.6,0.3c-7.8,1.5-14.4,10.3-13.7,17.9c0,0.7-1.1,1.7-1.9,1.9h-1.9C21.8,60.3,20.8,59.1,20.8,58.2z"/> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Pengajuan Cuti</span>
                </a>
            </li>
            <li>
                <a href="{{route('approvalKasie.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="approve-document" class="flex-shrink-0 w-6 h-6" fill="#ffffff">
                        <path d="M13.93,27.19H5.5a1,1,0,0,1,0-2h7.74A9.87,9.87,0,0,1,13,23a9.63,9.63,0,0,1,.32-2.48H5.5a1,1,0,0,1,0-2h8.57A10,10,0,0,1,19,13.85H5.5a1,1,0,0,1,0-2h14a1,1,0,0,1,1,1,1,1,0,0,1-.14.51A9.62,9.62,0,0,1,23,13c.34,0,.67,0,1,.05V4a3,3,0,0,0-3-3H4A3,3,0,0,0,1,4V28a3,3,0,0,0,3,3H17A10,10,0,0,1,13.93,27.19ZM5.5,5.19h14a1,1,0,0,1,0,2H5.5a1,1,0,0,1,0-2Z"></path>
                        <path d="M23,15a8,8,0,1,0,8,8A8,8,0,0,0,23,15Zm3.16,7.25-3.46,3a1,1,0,0,1-.65.25,1,1,0,0,1-.66-.25l-1.55-1.34a1,1,0,0,1,1.32-1.51l.89.77,2.79-2.42a1,1,0,1,1,1.32,1.5Z"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Approval Cuti</span>
                </a>
            </li>
            <li>
                <a href="/grading" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" width="800px" height="800px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <path d="M1185.941 0c73.525 0 135.643 47.322 159.021 112.941h462.156V1920H113V112.941h462.155C598.535 47.322 660.652 0 734.176 0Zm56.47 1468.235H903.589v112.941h338.824v-112.94Zm-451.764-225.882H451.824v338.823h338.823v-338.823Zm677.647 0H903.588v112.941h564.706v-112.941ZM790.647 677.647H451.824v338.824h338.823V677.647Zm451.765 225.882H903.588v112.942h338.824V903.529Zm225.882-225.882H903.588v112.941h564.706v-112.94Zm-282.353-564.706H734.176c-31.058 0-56.47 25.299-56.47 56.47v169.413h564.706V169.412c0-31.172-25.412-56.47-56.47-56.47Z" fill-rule="evenodd"/> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Penilaian Karyawan</span>
                </a>
            </li>

            @elseif(Auth::user()->user_level == 4)
            <li>
                <a href="{{route('profilEmp.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Profil</span>
                </a>
            </li>
            <li>
                <a href="{{route('cutiEmp.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <path d="M77.4,78.1H40.5c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h36.9 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6C79.8,77,78.8,78.1,77.4,78.1C77.5,78.1,77.5,78.1,77.4,78.1z"/> <path d="M26.6,78.1H22c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h4.6 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6C29,77,28,78,26.8,78.1C26.7,78.1,26.7,78.1,26.6,78.1z"/> <path d="M53.8,57.6c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h23.6 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6c0,1.2-1,2.3-2.2,2.3c0,0-0.1,0-0.1,0H53.8z"/> <path d="M62.6,37.1c-1.2,0-2.3-1-2.3-2.2c0,0,0-0.1,0-0.1v-4.6c0-1.2,1-2.3,2.2-2.3c0,0,0.1,0,0.1,0h14.8 c1.2,0,2.3,1,2.3,2.2c0,0,0,0.1,0,0.1v4.6c0,1.2-1,2.3-2.2,2.3c0,0-0.1,0-0.1,0H62.6z"/> <path d="M20.8,58.2C19.6,47.5,28,36.4,38,34.5l2.7-0.6c0.5-0.1,0.9-0.6,0.8-1.2c0-0.3-0.2-0.5-0.4-0.6l-6.7-4.5 c-0.7-0.5-0.8-1.4-0.3-2c0,0,0,0,0-0.1l1.7-2.5c0.4-0.7,1.4-0.9,2-0.4c0,0,0,0,0.1,0L54,33.5c0.7,0.4,0.9,1.4,0.4,2c0,0,0,0,0,0.1 l-11,16.2c-0.4,0.7-1.4,0.9-2,0.4c0,0,0,0-0.1,0l-2.5-1.7c-0.7-0.4-0.9-1.4-0.4-2c0,0,0,0,0-0.1l4.4-6.7c0.3-0.4,0.3-1.1-0.2-1.4 c-0.2-0.2-0.5-0.3-0.8-0.2l-1.6,0.3c-7.8,1.5-14.4,10.3-13.7,17.9c0,0.7-1.1,1.7-1.9,1.9h-1.9C21.8,60.3,20.8,59.1,20.8,58.2z"/> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Pengajuan Cuti</span>
                </a>
            </li>
            <li>
                <a href="/grading" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" width="800px" height="800px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <path d="M1185.941 0c73.525 0 135.643 47.322 159.021 112.941h462.156V1920H113V112.941h462.155C598.535 47.322 660.652 0 734.176 0Zm56.47 1468.235H903.589v112.941h338.824v-112.94Zm-451.764-225.882H451.824v338.823h338.823v-338.823Zm677.647 0H903.588v112.941h564.706v-112.941ZM790.647 677.647H451.824v338.824h338.823V677.647Zm451.765 225.882H903.588v112.942h338.824V903.529Zm225.882-225.882H903.588v112.941h564.706v-112.94Zm-282.353-564.706H734.176c-31.058 0-56.47 25.299-56.47 56.47v169.413h564.706V169.412c0-31.172-25.412-56.47-56.47-56.47Z" fill-rule="evenodd"/> </g>
                </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Penilaian Karyawan</span>
                </a>
            </li>
            
            @elseif(Auth::user()->user_level == 5)
            <li>
                <a href="{{route('usermanagement.index')}}" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V18c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-1.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05.02.01.03.03.04.04 1.14.83 1.93 1.94 1.93 3.41V18c0 .35-.07.69-.18 1H22c.55 0 1-.45 1-1v-1.5c0-2.33-4.67-3.5-7-3.5z"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">User Management</span>
                </a>
            </li>
            @endif
            
            <li>
                <a href="{{route('actionlogout')}}" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-900 hover:bg-opacity-25">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>