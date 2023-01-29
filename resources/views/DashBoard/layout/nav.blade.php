<style>
    .nav-pills .nav-item {
        float: right;
        width: 100%
    }
</style>







<li class="nav-item ">
    <a href="{{ route('dashboard') }}" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            الصفحه الرئيسيه
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
</li>




<li class="nav-item">
    <a href="#" class="nav-link bg-success">
        <i class="fa-solid fa-folder-open"></i>
        <p>
            الغرف
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href={{ route('rooms.index') }} class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p> كل الغرف </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('rooms.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                    اضافه غرفه
                </p>
            </a>
        </li>


    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link bg-success">
        <i class="fa-solid fa-folder-open"></i>
        <p>
            attendence
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href={{ route('attend.index') }} class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p> كل الحضور </p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link bg-success">
        <i class="fa-solid fa-folder-open"></i>
        <p>
            Excepected
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href={{ route('comming.index') }} class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p> كل الحضور </p>
            </a>
        </li>
    </ul>
</li>
