<section class="pb-4">
    <div class="bg-white border rounded-5">
        <section class="w-100 p-4 d-flex justify-content-center pb-4">
            <form class="simple" method="post" action="{{ route($type . 'Book', $id ?? '')}}" accept-charset="utf-8">
            {{ csrf_field() }}

            <!-- Name input -->
                <div class="form-outline mb-2">
                    <div class="mb-1">
                        <label for="book-name" class="form-label">Book Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="book-name"
                            name="bookName"
                            value="{{$name ?? ''}}"
                        >
                    </div>
                </div>

                <!-- Author input -->
                <div class="form-outline mb-2">
                    <div class="mb-1">
                        <label for="author" class="form-label">Author</label>
                        <input
                            type="text"
                            class="form-control"
                            id="author"
                            name="bookAuthor"
                            value="{{ $author ?? '' }}"
                        >
                    </div>
                </div>

                @if ($type === 'edit' && $id)
                    <div class="form-check mb-2">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            name="bookStatus"
                            id="status"
                            {{ $status === 1 ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="flexCheckDefault">
                            Taken
                        </label>
                    </div>
                @endif

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">{{ ucfirst($type) }}</button>
            </form>
        </section>
    </div>
</section>