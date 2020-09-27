<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#">
                    <i class="icon-speech"></i>
                </a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i>  Dashboard</a>
                <a class="btn" href="#">
                    <i class="icon-settings"></i>  New Inventory Item</a>
            </div>
        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-header">
                            <strong>New Inventory Item</strong>
                        </div>
                        <div class="card-body">
                            <form name="inventoryNew" id="inventoryNew" method="POST" action="#URL">
                                <div class="form-group row">
                                    <label for="amount" class="col-md-2 col-form-label">Inventory Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="inventoryName" name="inventoryName" type="text" placeholder="Inventory Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Inventory Type</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="inventoryType" name="inventoryType" type="text" placeholder="Inventory Type">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vat" class="col-md-2 col-form-label">Inventory Quantity</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="inventoryQty" name="inventoryQty" type="text" placeholder="Inventory Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-md-2 col-form-label">Amount</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="inventoryAmount" name="inventoryAmount" type="text" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-2 col-form-label">Date</label>
                                    <div class="col-md-10">
                                        <input class="form-control" id="inventoryDate" name="inventoryDate" type="date" placeholder="Date">
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="btn btn-danger" value="Add Inventory" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
