<div class="w-full md:w-4/5 mx-auto">
    <div class="my-2 md:my-5 text-center">
        <button class="btn-dashboard group" onclick="return location='{{ route('bookmarks')}}';"><span class="btn-dashboard-count">20</span> Bookmarks</button>
        <button class="btn-dashboard group mt-2 md:mt-0" onclick="return location='{{ route('notes')}}';"><span class="btn-dashboard-count">20</span> Notebooks</button>
    </div>
    <div class="my-2 md:my-5 text-center">
        <button class="btn-dashboard group" onclick="return location='{{ route('short-urls')}}';"><span class="btn-dashboard-count">20</span> Short URLs</button>
        <button class="btn-dashboard group mt-2 md:mt-0" onclick="return location='{{ route('add-tag')}}';"><span class="btn-dashboard-count">20</span> Notes</button>
    </div>
</div>
