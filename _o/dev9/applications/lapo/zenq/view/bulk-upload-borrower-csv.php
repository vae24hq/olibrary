<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Loans</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#">
                    <i class="icon-speech"></i>
                </a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i>  Trasaction</a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i>  Bulk Upload
                </a>
                <a class="btn" href="#">
                    <i class="icon-settings"></i>  Upload Borrower CSV</a>
            </div>
        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card">
                        <div class="card-header">
                            <strong>Upload Transactions from CSV file</strong>
                        </div>
                        <div class="card-body">
                            <h6 style="color:red;" class="mt-1">Step 1: Upload File</h6>
                            <p>If you have Savings Transactions data in an Excel or CSV file, you can import the data using this page.</p>
                            <ul>
                                <li>Open your excel file.</li>
                                <li>Click on File and Save as.</li>
                                <li>Select where you would like to save the file (like your desktop or a drive).</li>
                                <li>
                                    <img src="assets/img/bulk_guide/save_as_csv.jpg" />
                                </li>
                                <li>In the File Name area, name your document.</li>
                                <li>In the Save as Type area, select CSV(Comma Delimited) from the pull down menu.</li>
                                <li>Besides CSV (comma delimited), there is CSV (Macintosh) and CSV (MS-DOS) formats available. Do not save the file as these formats.</li>
                                <li>
                                    <img src="assets/img/bulk_guide/save_as_csv2.jpg" />
                                </li>
                                <li>Click Save.</li>
                                <li>You may receive one or two warning about the formatting of .csv, click yes.</li>
                            </ul>
                            <div class="col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4>Prepare your Savings Transactions file:</h4>
                                            <div class="row">
                                                <div class="col-md-2" style="color:red;"><u>Required Columns</u></div>
                                                <div class="col-md-10"><u>Allowed Values</u></div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Savings Account Number</div>
                                                <div class="col-md-10">Unique Savings Account Number. If you don't enter a savings account number, a Savings column will be added in Step 2 so you can select the corresponding savings account for each transaction.</div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Type</div>
                                                <div class="col-md-10">
                                                    Deposit <br />
                                                    Withdrawal<br />
                                                    Bank Fees<br />
                                                    Interest<br />
                                                    Dividend<br />
                                                    Transfer In<br />
                                                    Transfer Out<br />
                                                    Commission<br />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Date</div>
                                                <div class="col-md-10">
                                                    Date when the savings transaction was entered. Must be in dd/mm/yyyy format
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Time</div>
                                                <div class="col-md-10">
                                                    Time when the savings transaction was entered. Must be in 24 hour format such as 16:35 or 09:10
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Amount</div>
                                                <div class="col-md-10">
                                                    Numbers or Decimals only
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Optional Columns</div>
                                                <div class="col-md-10">
                                                    Allowed Values
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-2">Description</div>
                                                <div class="col-md-10">
                                                    Any
                                                </div>
                                            </div>
                                            <hr />

                                            <h6 style="color:red;" class="mt-1">Tips:</h6>
                                            <ul>
                                                <li>Click here to download a sample file.</li>
                                                <li>Savings Transactions will be uploaded in Branch #1 since you are currently logged into this branch.</li>
                                                <li>It is advisable that you have a savings account number column in the savings transactions file otherwise you will have to manually </li>
                                                <li>select the savings account number for each transaction.</li>
                                                <li>Please delete commas and currency symbols in the Amount column. Only have numbers or decimals in the Amount column.</li>
                                                <li>The Date column must have dates in the dd/mm/yyyy format.</li>
                                                <li>You can upload a maximum of 4500 entries in 1 file. If you have more entries, please split them into multiple files.</li>
                                            </ul>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <!--breaker header-->
                            <div class="row" style="background: #d2d6de;">
                                <div class="col-sm-12 m-1 pt-1">
                                    <h6>Select the options that apply to all transactions in the file:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="interest" class="col-md-2 col-form-label">Do you have Savings Account Number column in the transactions file?</label>
                                <div class="col-md-10">
                                    <input id="amount" name="cal_interest_ammount" type="radio" value="yes" /> Yes
                                    <input id="amount" name="cal_interest_ammount" type="radio" value="yes" /> No
                                    <br />
                                    <small>If you select No above, a Savings Account Number column will be added in Step 2 so you can select the corresponding savings account number for each transaction.</small>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="card bg-primary">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <h4>Maximum Fields Allowed in File:</h4>
                                            <p>If you select No above, you can upload a <u>maximum of 4,500 fields in 1 file.</u></p>

                                            <p>If you select Yes above, you can upload <u>approximately 40,000 fields (maximum of 2,000 rows) in 1 file.</u></p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>

                            <!--breaker header-->
                            <div class="row" style="background: #d2d6de;">
                                <div class="col-sm-12 m-1 pt-1">
                                    <h6>Upload File</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-md-2 col-form-label">Columns Separated By</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="amount" type="text">
                                        <option value="Comma">Comma</option>
                                        <option value="Semi-Colon">Semi-Colon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-md-2 col-form-label">Upload CSV File(.csv)</label>
                                <div class="col-md-10">
                                    <input class="form-control" id="amount" type="file" />
                                </div>
                            </div>

                            <input type="submit" name="submit" class="btn btn-danger" value="Prepare Loan" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
