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
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="./">
						<i class="icon-graph"></i>  Loans
					</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i> Loan Arrears</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong>Loans Arrears
									    <small>Loans that are overdue and have not received any payment for the last collection date. If you enter a part-payment for the last collection date for a loan, it wil be marked as Arrears status instead.</small>
									</strong>
								</div>
								<div class="col-sm-12 col-md-12 mt-1">
								    <div class="card">
								        <div class="card-body">
                                            <form name="loanForm" id="loanForm" method="POST" action="#URL">
                                            <div class="form-group row">
        										<label for="amount" class="col-md-2 col-form-label">Overdue By</label>
        										<div class="col-md-10">
        											<select class="form-control" name="loanOverDue" id="inputOverdueDays">
        											    <option value="1" selected="">1 day</option>
        											    <option value="2">2 days</option>
        											    <option value="3">3 days</option>
        											    <option value="4">4 days</option>
        											    <option value="5">5 days</option>
        											    <option value="6">6 days</option>
        											    <option value="7">7 days</option>
        											    <option value="8">8 days</option>
        											    <option value="9">9 days</option>
        											    <option value="10">10 days</option>
        											    <option value="11">11 days</option>
        											    <option value="12">12 days</option>
        											    <option value="13">13 days</option>
        											    <option value="14">14 days</option>
        											    <option value="15">15 days</option>
        											    <option value="16">16 days</option>
        											    <option value="17">17 days</option>
        											    <option value="18">18 days</option>
        											    <option value="19">19 days</option>
        											    <option value="20">20 days</option>
        											    <option value="21">21 days</option>
        											    <option value="22">22 days</option>
        											    <option value="23">23 days</option>
        											    <option value="24">24 days</option>
        											    <option value="25">25 days</option>
        											    <option value="26">26 days</option>
        											    <option value="27">27 days</option>
        											    <option value="28">28 days</option>
        											    <option value="29">29 days</option>
        											    <option value="30">30 days</option>
        											    <option value="31">31 days</option>
        											    <option value="32">32 days</option>
        											    <option value="33">33 days</option>
        											    <option value="34">34 days</option>
        											    <option value="35">35 days</option>
        											    <option value="36">36 days</option>
        											    <option value="37">37 days</option>
        											    <option value="38">38 days</option>
        											    <option value="39">39 days</option>
        											    <option value="40">40 days</option>
        											    <option value="41">41 days</option>
        											    <option value="42">42 days</option>
        											    <option value="43">43 days</option>
        											    <option value="44">44 days</option>
        											    <option value="45">45 days</option>
        											    <option value="46">46 days</option>
        											    <option value="47">47 days</option>
        											    <option value="48">48 days</option>
        											    <option value="49">49 days</option>
        											    <option value="50">50 days</option>
        											    <option value="51">51 days</option>
        											    <option value="52">52 days</option>
        											    <option value="53">53 days</option>
        											    <option value="54">54 days</option>
        											    <option value="55">55 days</option>
        											    <option value="56">56 days</option>
        											    <option value="57">57 days</option>
        											    <option value="58">58 days</option>
        											    <option value="59">59 days</option>
        											    <option value="60">60 days</option>
        											    <option value="61">61 days</option>
        											    <option value="62">62 days</option>
        											    <option value="63">63 days</option>
        											    <option value="64">64 days</option>
        											    <option value="65">65 days</option>
        											    <option value="66">66 days</option>
        											    <option value="67">67 days</option>
        											    <option value="68">68 days</option>
        											    <option value="69">69 days</option>
        											    <option value="70">70 days</option>
        											    <option value="71">71 days</option>
        											    <option value="72">72 days</option>
        											    <option value="73">73 days</option>
        											    <option value="74">74 days</option>
        											    <option value="75">75 days</option>
        											    <option value="76">76 days</option>
        											    <option value="77">77 days</option>
        											    <option value="78">78 days</option>
        											    <option value="79">79 days</option>
        											    <option value="80">80 days</option>
        											    <option value="81">81 days</option>
        											    <option value="82">82 days</option>
        											    <option value="83">83 days</option>
        											    <option value="84">84 days</option>
        											    <option value="85">85 days</option>
        											    <option value="86">86 days</option>
        											    <option value="87">87 days</option>
        											    <option value="88">88 days</option>
        											    <option value="89">89 days</option>
        											    <option value="90">90 days</option>
        											    <option value="91">91 days</option>
        											    <option value="92">92 days</option>
        											    <option value="93">93 days</option>
        											    <option value="94">94 days</option>
        											    <option value="95">95 days</option>
        											    <option value="96">96 days</option>
        											    <option value="97">97 days</option>
        											    <option value="98">98 days</option>
        											    <option value="99">99 days</option>
        											    <option value="100">100 days</option>
        											    <option value="101">101 days</option>
        											    <option value="102">102 days</option>
        											    <option value="103">103 days</option>
        											    <option value="104">104 days</option>
        											    <option value="105">105 days</option>
        											    <option value="106">106 days</option>
        											    <option value="107">107 days</option>
        											    <option value="108">108 days</option>
        											    <option value="109">109 days</option>
        											    <option value="110">110 days</option>
        											    <option value="111">111 days</option>
        											    <option value="112">112 days</option>
        											    <option value="113">113 days</option>
        											    <option value="114">114 days</option>
        											    <option value="115">115 days</option>
        											    <option value="116">116 days</option>
        											    <option value="117">117 days</option>
        											    <option value="118">118 days</option>
        											    <option value="119">119 days</option>
        											    <option value="120">120 days</option>
        											    <option value="121">121 days</option>
        											    <option value="122">122 days</option>
        											    <option value="123">123 days</option>
        											    <option value="124">124 days</option>
        											    <option value="125">125 days</option>
        											    <option value="126">126 days</option>
        											    <option value="127">127 days</option>
        											    <option value="128">128 days</option>
        											    <option value="129">129 days</option>
        											    <option value="130">130 days</option>
        											    <option value="131">131 days</option>
        											    <option value="132">132 days</option>
        											    <option value="133">133 days</option>
        											    <option value="134">134 days</option>
        											    <option value="135">135 days</option>
        											    <option value="136">136 days</option>
        											    <option value="137">137 days</option>
        											    <option value="138">138 days</option>
        											    <option value="139">139 days</option>
        											    <option value="140">140 days</option>
        											    <option value="141">141 days</option>
        											    <option value="142">142 days</option>
        											    <option value="143">143 days</option>
        											    <option value="144">144 days</option>
        											    <option value="145">145 days</option>
        											    <option value="146">146 days</option>
        											    <option value="147">147 days</option>
        											    <option value="148">148 days</option>
        											    <option value="149">149 days</option>
        											    <option value="150">150 days</option>
        											    <option value="151">151 days</option>
        											    <option value="152">152 days</option>
        											    <option value="153">153 days</option>
        											    <option value="154">154 days</option>
        											    <option value="155">155 days</option>
        											    <option value="156">156 days</option>
        											    <option value="157">157 days</option>
        											    <option value="158">158 days</option>
        											    <option value="159">159 days</option>
        											    <option value="160">160 days</option>
        											    <option value="161">161 days</option>
        											    <option value="162">162 days</option>
        											    <option value="163">163 days</option>
        											    <option value="164">164 days</option>
        											    <option value="165">165 days</option>
        											    <option value="166">166 days</option>
        											    <option value="167">167 days</option>
        											    <option value="168">168 days</option>
        											    <option value="169">169 days</option>
        											    <option value="170">170 days</option>
        											    <option value="171">171 days</option>
        											    <option value="172">172 days</option>
        											    <option value="173">173 days</option>
        											    <option value="174">174 days</option>
        											    <option value="175">175 days</option>
        											    <option value="176">176 days</option>
        											    <option value="177">177 days</option>
        											    <option value="178">178 days</option>
        											    <option value="179">179 days</option>
        											    <option value="180">180 days</option>
        											    <option value="181">181 days</option>
        											    <option value="182">182 days</option>
        											    <option value="183">183 days</option>
        											    <option value="184">184 days</option>
        											    <option value="185">185 days</option>
        											    <option value="186">186 days</option>
        											    <option value="187">187 days</option>
        											    <option value="188">188 days</option>
        											    <option value="189">189 days</option>
        											    <option value="190">190 days</option>
        											    <option value="191">191 days</option>
        											    <option value="192">192 days</option>
        											    <option value="193">193 days</option>
        											    <option value="194">194 days</option>
        											    <option value="195">195 days</option>
        											    <option value="196">196 days</option>
        											    <option value="197">197 days</option>
        											    <option value="198">198 days</option>
        											    <option value="199">199 days</option>
        											    <option value="200">200 days</option>
        											    <option value="201">201 days</option>
        											    <option value="202">202 days</option>
        											    <option value="203">203 days</option>
        											    <option value="204">204 days</option>
        											    <option value="205">205 days</option>
        											    <option value="206">206 days</option>
        											    <option value="207">207 days</option>
        											    <option value="208">208 days</option>
        											    <option value="209">209 days</option>
        											    <option value="210">210 days</option>
        											    <option value="211">211 days</option>
        											    <option value="212">212 days</option>
        											    <option value="213">213 days</option>
        											    <option value="214">214 days</option>
        											    <option value="215">215 days</option>
        											    <option value="216">216 days</option>
        											    <option value="217">217 days</option>
        											    <option value="218">218 days</option>
        											    <option value="219">219 days</option>
        											    <option value="220">220 days</option>
        											    <option value="221">221 days</option>
        											    <option value="222">222 days</option>
        											    <option value="223">223 days</option>
        											    <option value="224">224 days</option>
        											    <option value="225">225 days</option>
        											    <option value="226">226 days</option>
        											    <option value="227">227 days</option>
        											    <option value="228">228 days</option>
        											    <option value="229">229 days</option>
        											    <option value="230">230 days</option>
        											    <option value="231">231 days</option>
        											    <option value="232">232 days</option>
        											    <option value="233">233 days</option>
        											    <option value="234">234 days</option>
        											    <option value="235">235 days</option>
        											    <option value="236">236 days</option>
        											    <option value="237">237 days</option>
        											    <option value="238">238 days</option>
        											    <option value="239">239 days</option>
        											    <option value="240">240 days</option>
        											    <option value="241">241 days</option>
        											    <option value="242">242 days</option>
        											    <option value="243">243 days</option>
        											    <option value="244">244 days</option>
        											    <option value="245">245 days</option>
        											    <option value="246">246 days</option>
        											    <option value="247">247 days</option>
        											    <option value="248">248 days</option>
        											    <option value="249">249 days</option>
        											    <option value="250">250 days</option>
        											    <option value="251">251 days</option>
        											    <option value="252">252 days</option>
        											    <option value="253">253 days</option>
        											    <option value="254">254 days</option>
        											    <option value="255">255 days</option>
        											    <option value="256">256 days</option>
        											    <option value="257">257 days</option>
        											    <option value="258">258 days</option>
        											    <option value="259">259 days</option>
        											    <option value="260">260 days</option>
        											    <option value="261">261 days</option>
        											    <option value="262">262 days</option>
        											    <option value="263">263 days</option>
        											    <option value="264">264 days</option>
        											    <option value="265">265 days</option>
        											    <option value="266">266 days</option>
        											    <option value="267">267 days</option>
        											    <option value="268">268 days</option>
        											    <option value="269">269 days</option>
        											    <option value="270">270 days</option>
        											    <option value="271">271 days</option>
        											    <option value="272">272 days</option>
        											    <option value="273">273 days</option>
        											    <option value="274">274 days</option>
        											    <option value="275">275 days</option>
        											    <option value="276">276 days</option>
        											    <option value="277">277 days</option>
        											    <option value="278">278 days</option>
        											    <option value="279">279 days</option>
        											    <option value="280">280 days</option>
        											    <option value="281">281 days</option>
        											    <option value="282">282 days</option>
        											    <option value="283">283 days</option>
        											    <option value="284">284 days</option>
        											    <option value="285">285 days</option>
        											    <option value="286">286 days</option>
        											    <option value="287">287 days</option>
        											    <option value="288">288 days</option>
        											    <option value="289">289 days</option>
        											    <option value="290">290 days</option>
        											    <option value="291">291 days</option>
        											    <option value="292">292 days</option>
        											    <option value="293">293 days</option>
        											    <option value="294">294 days</option>
        											    <option value="295">295 days</option>
        											    <option value="296">296 days</option>
        											    <option value="297">297 days</option>
        											    <option value="298">298 days</option>
        											    <option value="299">299 days</option>
        											    <option value="300">300 days</option>
        											    <option value="301">301 days</option>
        											    <option value="302">302 days</option>
        											    <option value="303">303 days</option>
        											    <option value="304">304 days</option>
        											    <option value="305">305 days</option>
        											    <option value="306">306 days</option>
        											    <option value="307">307 days</option>
        											    <option value="308">308 days</option>
        											    <option value="309">309 days</option>
        											    <option value="310">310 days</option>
        											    <option value="311">311 days</option>
        											    <option value="312">312 days</option>
        											    <option value="313">313 days</option>
        											    <option value="314">314 days</option>
        											    <option value="315">315 days</option>
        											    <option value="316">316 days</option>
        											    <option value="317">317 days</option>
        											    <option value="318">318 days</option>
        											    <option value="319">319 days</option>
        											    <option value="320">320 days</option>
        											    <option value="321">321 days</option>
        											    <option value="322">322 days</option>
        											    <option value="323">323 days</option>
        											    <option value="324">324 days</option>
        											    <option value="325">325 days</option>
        											    <option value="326">326 days</option>
        											    <option value="327">327 days</option>
        											    <option value="328">328 days</option>
        											    <option value="329">329 days</option>
        											    <option value="330">330 days</option>
        											    <option value="331">331 days</option>
        											    <option value="332">332 days</option>
        											    <option value="333">333 days</option>
        											    <option value="334">334 days</option>
        											    <option value="335">335 days</option>
        											    <option value="336">336 days</option>
        											    <option value="337">337 days</option>
        											    <option value="338">338 days</option>
        											    <option value="339">339 days</option>
        											    <option value="340">340 days</option>
        											    <option value="341">341 days</option>
        											    <option value="342">342 days</option>
        											    <option value="343">343 days</option>
        											    <option value="344">344 days</option>
        											    <option value="345">345 days</option>
        											    <option value="346">346 days</option>
        											    <option value="347">347 days</option>
        											    <option value="348">348 days</option>
        											    <option value="349">349 days</option>
        											    <option value="350">350 days</option>
        											    <option value="351">351 days</option>
        											    <option value="352">352 days</option>
        											    <option value="353">353 days</option>
        											    <option value="354">354 days</option>
        											    <option value="355">355 days</option>
        											    <option value="356">356 days</option>
        											    <option value="357">357 days</option>
        											    <option value="358">358 days</option>
        											    <option value="359">359 days</option>
        											    <option value="360">360 days</option>
        											</select>
        											</div>
        								    </div>
        								    <div class="form-group row">
        										<label for="amount" class="col-md-2 col-form-label">Borrower Name / Business Name</label>
        										<div class="col-md-10">
        											<input class="form-control" id="loanBorrowerName" name="loanBorrowerName" type="text" placeholder="Borrower Name / Business Name">
        										</div>

        									</div>
        								    <div class="form-group row">
        										<label for="amount" class="col-md-2 col-form-label">Loan</label>
        										<div class="col-md-10">
        											<input class="form-control" id="loanAmount" name="loanAmount" type="text" placeholder="Loan">
        										</div>

        									</div>
        								    <div class="form-group row">
        										<label for="amount" class="col-md-2 col-form-label">All Loan Officer</label>
        										<div class="col-md-10">
        											<select class="form-control" id="loanOfficer" name="loanOfficer" type="text">
                                                        <option>Choose Type</option>
                                                        <option value="Bussiness Loan">Business Loan</option>
                                                        <option value="Overseas Worker Loan">Overseas Worker Loan</option>
                                                        <option value="Prisoner Loan">Prisoner Loan</option>
                                                        <option value="Personal Loan">Personal Loan</option>
                                                        <option value="Student Loan">Student Loan</option>
                                                    </select>
        										</div>

        									</div>
        								    <div class="form-group row">
        										<label for="amount" class="col-md-2 col-form-label">Collateral Status</label>
        										<div class="col-md-10">
        											<select class="form-control" id="loanCollateralStatus" name="loanCollateralStatus" type="text">
                                                        <option value="Deposited into Branch">Deposited into Branch</option>
                                                        <option value="Collateral with Borrower">Collateral with Borrower</option>
                                                        <option value="Return to Borrower">Return to Borrower</option>
                                                        <option value="Reposession Initiated">Reposession Initiated</option>
                                                        <option value="Repossesed">Repossesed</option>
                                                        <option value="Under Auction">Under Auction</option>
                                                        <option value="Solid">Solid</option>
                                                        <option value="Lost">Lost</option>
                                                    </select>
        										</div>

        									</div>
        									<div class="row">
								                <div class="col-md-5">
                                                    <input class="form-control" id="loanStartDate" type="date" placeholder="">
                                                </div>
								                <div class="col-md-2 text-center">
                                                    <h6>To</h6>
                                                </div>
								                <div class="col-md-5">
                                                    <input class="form-control" id="loanEndDate" type="date" placeholder="">
                                                </div>
								            </div>
                                            <div class="row">
								                <div class="col-md-12">
                                                    <a href="#" class="btn btn-primary mt-1">Search!</a>
                                                </div>
								            </div>

                                            </form>
								        </div>
								    </div>
								</div>

								<div class="card-body">

        						<div class="col-sm-12">
        						    <a href="#" class="btn btn-success mb-1">Export</a>
        							<div class="card">
        								<div class="card-header">
        									<div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <form name="transactionForm" id="transactionForm" method="POST" action="#URL">
                                                            <input class="form-control" id="search" type="text" placeholder="Search">
                                                        </form>
                                                    </div>
                                                </div>

        										<table class="table table-responsive-sm table-striped">
        											<thead>
        												<tr>
        													<th>Name</th>
        													<th>Loan</th>
        													<th>Principal</th>
        													<th>Due</th>
        													<th>Paid</th>
        													<th>PastDue</th>
        													<th>Amortization</th>
        													<th>PendingDue</th>
        													<th>NextDue</th>
        													<th>Last Payment</th>
        													<th>Status</th>
        												</tr>
        											</thead>
        											<tbody>
        												<tr>
        													<td>Tony Osawere</td>
        													<td>2,0000</td>
        													<td>5</td>
        													<td>22/2/2020</td>
        													<td>Yes</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>

        												</tr>
        											</tbody>
        										</table>
        										<ul class="pagination">
        											<li class="page-item">
        												<a class="page-link" href="#">Prev</a>
        											</li>
        											<li class="page-item active">
        												<a class="page-link" href="#">1</a>
        											</li>
        											<li class="page-item">
        												<a class="page-link" href="#">2</a>
        											</li>
        											<li class="page-item">
        												<a class="page-link" href="#">3</a>
        											</li>
        											<li class="page-item">
        												<a class="page-link" href="#">4</a>
        											</li>
        											<li class="page-item">
        												<a class="page-link" href="#">Next</a>
        											</li>
        										</ul>
        									</div>
        								</div>
        							</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
