<div class="section-wrapper">
  <section class="service" id="{{$service->alias}}" name="{{$service->alias}}" style="background-color:{{$service->color}}">
    <div class="wrapper">
      <img src="/assets/picto/croped/{{$service->icon}}.svg">
    </div>
    <div class="container">
      <div class="row page-wrapper">
        <div class="col-md-4">
          <div class="context">
            <div class="media">
              <img src="/assets/picto/{{$service->icon}}.svg" type="image/svg+xml" height="100%" width="auto">
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="content">
            <div class="header">
              <div class="row">
                <div class="col-md-9">
                  <h2>{{$service->name}}</h2>
                </div>
              </div>
            </div>
            <div class="body">
              <p>{{$service->announce}}</p>
              <ul class="nav nav-pills nav-vertical">
                <li><a href="services/{{$service->alias}}#tab-products">Продукты</a></li>
                <li><a href="services/{{$service->alias}}#tab-solutions">Решения</a></li>
<!--                <li><a href="services/{{$service->alias}}#tab-specials">Акции</a></li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>