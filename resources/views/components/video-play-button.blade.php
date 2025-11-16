@props(['size' => '50px', 'iconSize' => '20px'])

<div class="position-absolute top-50 start-50 translate-middle">
    <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
         style="width: {{ $size }}; height: {{ $size }}; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
        <i class="feather icon-feather-play text-dark-gray"
           style="font-size: {{ $iconSize }}; margin-left: 2px;"></i>
    </div>
</div>
