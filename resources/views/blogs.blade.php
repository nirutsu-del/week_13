@extends('layouts.app')

@section('title', 'บทความ')

@section('content')
    @if (Count($blogs) > 0)
        <h2 class="text text-center py-2">บทความทั้งหมด</h2>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <!-- <td>{{ Str::limit($item->content, 10) }}</td> -->
                        <td>
                            @if ($item->status)
                                <a href="/change/{{ $item->id }}"><span class="btn btn-success">เผยแพร่</span></a>
                            @else
                                <a href="/change/{{ $item->id }}"><span class="btn btn-danger">ไม่เผยแพร่</span></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ Route('edit', $item->id) }}"><span class="btn btn-warning">แก้ไข</span></a>
                        </td>
                        <td><a href="{{ Route('delete', $item->id) }}" class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบบทความนี้ {{ $item->title }} จริงหรือไม่?')">ลบ </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    @else
        <h3 class="text text-center py-2">ไม่มีบทความ</h3>
    @endif
@endsection
