@extends('layouts.app')

@section('content')
    <section id="my-banner">
        <img class="img-responsive" src="{{asset('img/service-banner.jpg')}}">
        <h1 class="banner-title wow fadeInDownBig">Cement Scanning</h1>
    </section>

    <div class="container">
        <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
        <div class="bootstrap-iso extra-padng">


            <!-- Modal -->
            <div class="modal fade services-modal-form" id="cementModal" role="dialog" data-keyboard="false"
                 data-backdrop="static">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="term-page-box">

                                <div class="col-md-12">
                                    <h2>OBJECTIVE</h2>
                                    <p> Utilizing electromagnetic (EM) and or (GPR) locating methods, with available
                                        print information we will underground utility locate locatable underground
                                        utilities at your site. The extent of the work encompasses the requested
                                        addresses. The mentioned services provided will be billed at an hourly rate.
                                    </p>
                                    <h3>SCOPE OF SERVICES</h3>
                                    <p><em>the exact scope of work and area to be utility located. We will mark the area
                                            in white paint specify.</em></p>
                                    <ol>
                                        <li>Using (EM) Locating & GPR or Cement Scanning equipment and the locating
                                            techniques described in this proposal. Bullseye locating will attempt to
                                            locate the requested utilities at your job site. Actual utility locates
                                            (Work) time may exceed the estimate. Work will not progress past estimated
                                            time without customer approval. Police detail process is an estimate actual
                                            cost of police detail may vary and not in the control of Bullseye Locating.
                                            The price quoted is an estimate any charge over the estimated price will
                                            past through to hiring client.
                                        </li>

                                    </ol>


                                    <h3>2.BULLSEYE LOCATING WILL GLAD TO :</h3>

                                    <ol>

                                        <li>Establish the exact scope of work and area to be utility located. We will
                                            mark the area in white paint to specify locate/survey areas if requested.
                                        </li>
                                        <li>Site meeting with available facilities personnel to gain access to buildings
                                            and added information on the underground plant in the area.
                                        </li>
                                        <li>Perform underground utility locate utilizing electromagnetic (EM) locating
                                            methods to establish the location of underground utilities.
                                        </li>
                                        <li>Delineate underground facilities with paint, flags, and stakes.</li>

                                    </ol>


                                    <h3>Caveats :</h3>

                                    <p> Bullseye Underground Utility Locating Service L.L.C. adheres to Dig Safe, Call
                                        Before You Dig (CBYD) or your local one-call center's laws and regulations. We
                                        utilize (NULCA), the National Utility Locating Contractors Association's best
                                        practices and guidelines for correct underground utility location methods.
                                        Bullseye will delineate using paint and flags along with available underground
                                        plant plans and topical evidence and mark requested locatable privately owned
                                        underground facilities located at your site. Bullseye specializes in locating
                                        and identifying any item placed below ground for use in connection with the
                                        conveyance of water, sewage, telephone or fiber optic communications, electric
                                        energy, oil, gas or other substances. For example, pipes, sewers, conduits,
                                        cables, valves, lines, wires, manholes, and empty conduit. We only locate
                                        facilities that convey gas, oil, fuels, toxic materials, explosive materials,
                                        and environmentally damaging products for survey purpose only not intended for
                                        excavation purposes.

                                        We do not mark irrigation, plastic pipes, septic tanks, leach fields,
                                        Underground fuel storage, or any tank below ground. Bullseye Underground Utility
                                        Locating uses electromagnetic line location (EMLL). These techniques are used to
                                        locate the electromagnetic field resulting from an electric current flowing on a
                                        line. These fields can arise from currents already on the line (known as passive
                                        or ambient signals) or currents applied to a line with a transmitter (active).
                                        The most common passive signals are generated by live electric lines, grounded
                                        water lines, and re-radiated radio signals. Active signals can be introduced
                                        onto conductive utilities by directly connecting the transmitter to the line at
                                        accessible locations, causing the signal to travel along the utility. This is
                                        referred to as electromagnetic conduction (EMC). Additionally, a signal can be
                                        introduced onto a line through electromagnetic induction (EMI). This involves
                                        transmitting a high-frequency electromagnetic field through the air with the
                                        transmitter placed on the ground surface in close proximity to the utility.
                                        Alternately, an induction clamp can be placed around specific metallic conduits
                                        in vaults or breaker boxes. The detection of underground utilities is dependent
                                        upon the composition and construction of the line of interest. Utilities
                                        detectable with standard line location techniques include most continuously
                                        connected metal pipes, cables/wires or non-metallic utilities equipped with
                                        tracer wires. These generally include water, electric, natural gas, telephone,
                                        and other conduits related to facility operations. If there are no passive
                                        currents present, then these utilities must be exposed at the surface or
                                        accessible in utility vaults in order to have an active signal placed on them.

                                        Utilities that are not detectable using standard electromagnetic line location
                                        techniques include those made of non-electrically conductive materials such as
                                        PVC, fiberglass, vitrified clay and metal pipes with insulating joints. Bullseye
                                        will attempt to place traceable material within the unlocatable pipe or conduit
                                        if access allows in order to induce a signal. The electromagnetic (EM) locating
                                        equipment we use to locate metallic pipes and or cables provides us with a range
                                        of frequencies necessary in a survey. Having the choice of frequencies at-hand
                                        gives us the ability to adjust to the unforeseen soil conditions as well as
                                        pipe/cable conditions which can be encountered unexpectedly on the job-site. The
                                        equipment also provides continuous depth-estimates to help confirm target
                                        conductors in which, secondly, can be applied for excavation and design
                                        information. A measure of accuracy varies allowing a hand dig tolerance of 28
                                        inches on either side of the utility-line mark out to the full depth of
                                        excavation. Depth-readings from equipment display are available upon request,
                                        however, they have their limitations and may not be accurate or relied upon for
                                        any purposes.
                                    </p>

                                    <h3>GPR Locating (Locate and Mark)</h3>
                                    <p> Bullseye Locating uses LMX200 ground-penetrating radar equipment to perform
                                        utility locate services. Bullseye uses the locate and mark technique this is the
                                        most common way of using GPR to track utilities. It is very similar to the use
                                        of traditional methods of tracking and detecting utility. The GPR sensor is
                                        moved along sweeps perpendicular to the anticipated utility axis. Bullseye
                                        Locating moves the GPR back and forth while marking the ground where the top of
                                        the hyperbola is observed, the alignment of the subsurface utility can be traced
                                        out and marked once a linear feature is detected. GPR systems that operate in
                                        the 100 to 500 MHz frequency range offer the best compromise between spatial
                                        resolution and exploration depth. The LMX200 system provides an excellent
                                        example of a GPR system optimized for utility locating. Other direct approaches
                                        for utility detection like EM locating or to trench, hand dig, or vacuum
                                        excavate to expose features. Any prior knowledge of underground, underground
                                        plans and accurate as-built drawings are recommended to be effective with these
                                        techniques. GPR is not without its limitations. GPR radio wave signals are
                                        absorbed by the ground with some soils (clays, saline) greatly limiting
                                        exploration depth. GPR effectiveness is thus site-specific and varies greatly
                                        from place to place.
                                    </p>
                                    <h3>GPR Data Disclaimer</h3>
                                    <p> Ground penetrating radar (GPR) is a non-destructive testing method used to
                                        locate materials such as concrete, plastic, metal, steel, rock, soil, ice, and
                                        pavement. At Bullseye Utility Locating LLC, we use the latest GPR technology to
                                        provide critical information on utilities, structural elements and other
                                        potential obstructions underground. Because depth of exploration is dependent
                                        upon the electrical properties of material(s) inspected and interpretations are
                                        opinions based on judgments made from those acquired radar signals and/or other
                                        data, Bullseye Utility Locating LLC does not guarantee the accuracy or
                                        correctness of interpretations and Bullseye Utility Locating LLC will not accept
                                        liability or responsibility for any loss, damage, or expense that may be
                                        incurred or sustained by any services or interpretations performed by Bullseye
                                        Utility Locating LLC. Even though, Bullseye Utility Locating LLC uses what we
                                        believe to be the best technology available in the market for Utility Location
                                        we cannot detect every buried utility. A buried line or pipe must conduct an
                                        electronic signal, transmitted by our equipment, to be accurately detected. At
                                        job sites, there will more than likely be subsurface utilities that cannot be
                                        detected, and many times utilities pass through a site without an above ground
                                        access point or giving any other indication that they are there. Our friendly
                                        and knowledgeable staff is always available to explain any limitations as they
                                        pertain to your site. For these reasons, Bullseye Utility Locating LLC is not
                                        responsible for any nonconductive lines (Non-Metallic, PVC, Water Line, Etc.)
                                        and for any conductive lines with no accessible connection point or those that
                                        do not appear on blueprints, maps, or as-builts provided by the customer prior
                                        to locating. Bullseye Utility Locating LLC is not responsible for any loss or
                                        damage arising out of the use of, or reliance on the data collected or the
                                        report presented.
                                    </p>
                                    <h3>Boring clearing or staking location details</h3>
                                    <p> Bullseye Underground Utility Locating cannot 100% clear a boring or stake
                                        locations of all utilities. Bullseye can identify and locate utilities running
                                        in a projected boring or stake location. This is done by examining print
                                        information provided by the customer, topical evidence and any information
                                        gained at the dig site. Excavator should always take extreme caution when
                                        driving/pounding in stakes, drilling or boring at a location after it is it is
                                        marked. Bullseye utilizes techniques such as (EM) Electromagnetic line tracing.
                                        This form of locating is economical but has its limitations. Even though all
                                        utility locating techniques has its limitations Bullseye does recommend GPR
                                        locating techniques along with (EM) to gain more formation before driving
                                        stakes, boring or excavating.
                                    </p>
                                    <h2>YOUR RESPONSIBILITIES</h2>

                                    <strong>This project may require your involvement in order to achieve a smooth and
                                        successful implementation; it will be your responsibility.</strong>
                                    <ul>

                                        <li>Access to the job site and building and locate area is clear of obstructions
                                            including snow, Ice, cars, trees, and brush etc...
                                        </li>
                                        <em>NOTE: If the site requires a lengthy preparation, inspection, health and
                                            safety training, the total time required to complete</em>

                                        <li>Supply as much utility print information for project site as possible.</li>
                                        <li>Supply contact information for maintenance and facilities personnel, if
                                            possible.
                                        </li>
                                        <li>Complete and sign proposal and locate request forms.</li>
                                        <li>Ensure the locate/survey area is clear prior to the start of work and is
                                            open and accessible to our crew and equipment.
                                        </li>
                                        <li>Call your local on call center and provide us with the current dig request
                                            number.
                                        </li>
                                        <li>Provide Client will provide Bullseye with all necessary access to the site
                                            so that Bullseye can complete the project in a timely manner.
                                        </li>
                                        <li>Client will also pre mark dig locations and plorations</li>

                                    </ul>


                                    <h2>STANDARD TERMS A CONDITIONS</h2>

                                    <p> The contract terms and conditions listed below are intended, together with the
                                        Proposal and Estimate, to constitute the entire contract between Bullseye
                                        Underground Utility Locating, LLC (“Bullseye”) and the client identified in the
                                        Proposal.
                                    </p>
                                    <strong>Change in Scope of Services:</strong>
                                    <p> If subsequent to the execution of this agreement, there is a change in the Scope
                                        of Services, either as ordered by the client or as necessitated by circumstances
                                        or authorities, there terms hereof will be amended by a writing that
                                        specifically describes the change and the agreed-upon change in compensation to
                                        Bullseye. Unless and until such a written amendment is executed, neither party
                                        shall be bound by and purported changes to this agreement.

                                        <strong>Provision of Site Access and Related Data:</strong>
                                    <p> Client will provide Bullseye with all necessary access to the site so that
                                        Bullseye can complete the project in a timely manner. The client will also mark
                                        locations for explorations that are suitably accurate for the purposes of the
                                        project. To aid in interpretation of data collected in the exploratory work
                                        proposed, the client agrees to provide Bullseye with copies of prior, current,
                                        or after-the-fact data and information related to the project as it becomes
                                        available to the client.
                                    </p>
                                    <strong>Reimbursable Expenses, Subcontractors, Payment of Fees:</strong>
                                    <p> Reimbursable expenses are those costs incurred by Bullseye, i.e, the fees and
                                        expenses subcontractors, costs of all supplies, materials, and services needed
                                        to meet the requirements of the services of this proposal. Payment for all such
                                        reimbursable expense is the obligation of the Client andClient's Responsibility
                                        to Notify of Hazards: It is the client's responsibility to advise of any known
                                        hazards or hazardous substances or any known conditions on or near the site that
                                        may present a potential danger to human health or to the environment. Bullseye
                                        is not responsible for claims or losses that result from the client’s failure to
                                        give such notice.
                                    </p>
                                    <strong>Termination Provision:</strong>
                                    <p>This agreement may be terminated by either party upon five (5) days written
                                        notice. Bullseye shall be paid for services completed up to the time of
                                        termination.

                                        <strong>Payment and Terms:</strong>
                                    <p>Payment is required at time of service. If Bullseye issues an invoice, Bullseye
                                        will issue invoices not more frequently than monthly. Payment of the amount
                                        invoiced is due within 10 calendar days of the invoice day. If payment is not
                                        made within 30 calendar days of the invoice date, the amounts due will include
                                        an interest assessment at the rate of 1-1/2% per month on the balance
                                        outstanding, commencing on the due date. If the client fails to make payment
                                        when due, Bullseye may, upon seven calendar day’s written notice to the client,
                                        suspend its performance of services under this agreement. The client agrees to
                                        pay for all reasonable collection costs including, but not limited to:
                                        attorney's fees, court costs and interest on overdue invoices.
                                    </p>
                                    <strong>Responsible Party:</strong>
                                    <p>The client, as the responsible party, agrees to compensate Bullseye at the
                                        standard or agreed rate for providing the professional services, as described in
                                        the proposal.
                                    </p>
                                    <strong>Delays:</strong>
                                    <p>Bullseye is not responsible for delays in the performance of the agreement due to
                                        inclement weather, illness, failure of equipment, the unanticipated degree of
                                        difficulty encountered in performing said services, or delay created within or
                                        by approving agencies. Neither will Bullseye be responsible for delays due to
                                        changes in conditions on the site or on property adjacent to the site that would
                                        adversely impact work conditions requiring delays or additional services.
                                    </p>
                                    <strong>Warranty and Limits of Liability, Waiver of Consequential Damages:</strong>
                                    <p>All professional services provided by Bullseye will be performed in accordance
                                        with generally accepted engineering, surveying and related professional services
                                        principles and practices but, otherwise, Bullseye makes no express or implied
                                        guarantees, representations or warranties as to the quality, fitness,
                                        merchantability, suitability of the services rendered under this Agreement.
                                        Further, the liability of Bullseye is hereby limited to the cost of the services
                                        performed. Further, each party waives its right to seek consequential, special
                                        and any other type of indirect damages related to the project.</p>
                                    </p>
                                    <strong>Indemnification:</strong>
                                    <p> Client agrees to indemnify, defend, release and hold Bullseye, and its
                                        employees, agents and subcontractors free and harmless with respect to all
                                        damages, claims, causes of action and otherwise with respect to any personal
                                        injury or property damage that may arise out of, or in relation to, the
                                        performance of the services hereunder or in connection with the project for
                                        which the services are being performed. Such indemnification will be
                                        irrespective of any actions, or failure to act, by or on behalf of Bullseye and
                                        will include all costs and expenses, including attorney’s fees, incurred in the
                                        investigation, defense, settlement or payment of such claim.
                                    </p>
                                    <strong>GPR Data Disclaimer:</strong>
                                    <p>Ground penetrating radar (GPR) is a non-destructive testing method used to locate
                                        materials such as concrete, plastic, metal, steel, rock, soil, ice, and
                                        pavement. At Bullseye Utility Locating LLC, we use the latest GPR technology to
                                        provide critical information on utilities, structural elements and other
                                        potential obstructions underground. Because depth of exploration is dependent
                                        upon the electrical properties of material(s) inspected and interpretations are
                                        opinions based on judgments made from those acquired radar signals and/or other
                                        data, Bullseye Utility Locating LLC does not guarantee the accuracy or
                                        correctness of interpretations and Bullseye Utility Locating LLC will not accept
                                        liability or responsibility for any loss, damage, or expense that may be
                                        incurred or sustained by any services or interpretations performed by Bullseye
                                        Utility Locating LLC. Even though, Bullseye Utility Locating LLC uses what we
                                        believe to be the best technology available in the market for Utility Location
                                        we cannot detect every buried utility. A buried line or pipe must conduct an
                                        electronic signal, transmitted by our equipment, to be accurately detected. At
                                        job sites, there will more than likely be subsurface utilities that cannot be
                                        detected, and many times utilities pass through a site without an above ground
                                        access point or giving any other indication that they are there. Our friendly
                                        and knowledgeable staff is always available to explain any limitations as they
                                        pertain to your site. For these reasons, Bullseye Utility Locating LLC is not
                                        responsible for any nonconductive lines (Non-Metallic, PVC, Water Line, Etc.)
                                        and for any conductive lines with no accessible connection point or those that
                                        do not appear on blueprints, maps, or as-builts provided by the customer prior
                                        to locating. Bullseye Utility Locating LLC is not responsible for any loss or
                                        damage arising out of the use of, or reliance on the data collected or the
                                        report presented.
                                    </p>
                                    <strong>Time Limitation:</strong>
                                    <p> This agreement is null and void unless executed by the client and returned to
                                        this office within 21 days of issuance.
                                    </p>
                                    <strong>Massachusetts Contract:</strong>
                                    <p>This agreement once signed and accepted by client and Bullseye shall be construed
                                        under and in accordance with the law of the Commonwealth of Massachusetts
                                    </p>
                                    <h2>CLOSING</h2>
                                    <p> We appreciate the opportunity to provide your underground utility locating
                                        needs. If you accept this proposal, please complete the form below. The client
                                        must agree to the terms and conditions before work can commence.</p> <br>
                                    <p> Bullseye Underground Utility Locating, LLC</p><br>
                                    <p> Manager<br></p>
                                    <p> O’Dell Young</p><br>

                                    <h2>CLIENT AUTHORIZATION</h2>
                                    <p> His proposal estimates and Standard Contract Terms are hereby accepted by the
                                        Client as evidenced by the execution hereof, and the person doing so on behalf
                                        of the Client represents that he or she has the full authority to act for and in
                                        the name of the Client.</p><br>

                                    <p>The execution by the Client constitutes authorization for Bullseye to proceed
                                        with the work contemplated in the scope of Services under the terms and
                                        conditions hereof.</p>


                                    {{-- <div class="form-new">

                                         <div class="col-md-12">
                                             <label>Assigned to by </label>
                                             <input type="text" name="" id="approve">

                                         </div>
                                         <div class="col-md-12">
                                             <label>Date</label>

                                             <input type="text" name="" id="date">

                                         </div>

                                             <div class="col-md-12">
                                                 <label>Name</label>
                                                 <input type="text" name="" id="name">
                                             </div>

                                         <p id="error"></p>
                                     </div>--}}

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="accept_button">Accept</button>
                                <button id="accept_button1" type="button" class="close btn btn-default text-center"
                                        data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-10 col-md-offset-1 text-left pricing-content wow fadeInDown">

                        <h2>PRICING & SCHEDULING</h2>


                        <p>
                            Please complete the form as much as possible. You will only be billed initially one hour for
                            your project service.Due to the type of Service Bullseye Utility Locating provides,
                            our technicians who will review your information and communicate with you on your project
                            for scheduling, request additional information if needed and let you know if more time is
                            needed to complete your project. If the additional locate time is required for your project,
                            you will be notified and given the opportunity to accept or decline the additional time.
                            If you accept the additional time, then you will be invoiced for that time at the end of the
                            project. Then you will be able to make payments via credit card or through check by mail.
                            After you complete you order you will be brought to your customer portal. You will be able
                            to track and manage your projects results, communicate with a utility locator. You will also
                            be able to reschedule, modify or cancel your request via the customer portal. Your customer
                            portal will also be where you can view locate results, locate photos, project documents and
                            invoices. If you have any question about you customer portal please contact us.

                        </p>
                        <p>
                            <b> Bullseye Underground Utility Locating offers a satisfaction guarantee. You can also
                                cancel and receive a full refund at any time.</b>

                        </p>


                        <h5><b>(GPR) Cement Scanning is billed $300.00 Per hour with a 2-hour minimum</b></h5>
                        <span> Note: $50 mobilization fee may be added if your job site location is further than 30 miles from Boston.</span>


                        <p class="head-content"><b>Estimated locate times are based area size</b><br>
                            Bullseye locating performs cement scanning by grid sizes this allows us to collect the data
                            and create depth slices. This allows us to peel down through the layers of cement revealing
                            targets. Grids take different amounts of time to lay out and collect data. Below is a rough
                            idea of how long it takes to layout the grid and collect the data. You can use this
                            information to get a good idea of how many grids it will take to collect the data for the
                            size area you need scanned. Keep in mind surface type ceilings, walls columns require
                            additional time. These estimates do not include the time to interpret the data and transpose
                            markings on surface.
                        </p>

                        <ul>
                            <li>24’’ X 24’’ – (½ Hour Each)</li>
                            <li>48’’ X 48’’ – (½ - 1 Hour Each)</li>
                            <li>24’’ X 48’’ – (½ -1 Hour Each)</li>
                            <li>24’’ X 96’’ – (1 Hour Each)</li>
                            <li>96’’ X 96’’ – (1-2 Hour Each)</li>

                        </ul>


                        <p>These time frames are a good rule of thumb but are not fixed. your project may take more or
                            less time depending on how many utilities are underground the size and scope of work
                            this will be communicated to you once your project has started.</p>
                    </div>


                    <div class="col-md-10 col-md-offset-1">
                        <form method="post" enctype="multipart/form-data" action="{{route('cement_store')}}"
                              id="cement_form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="text">
                                            <h1 class="larger-service"> (GPR) Cement Scanning </h1>
                                        </label>
                                        <input class="form-control" id="text" name="price"
                                               placeholder="Starting price $200.00"
                                               type="number" value="600" readonly/>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="div-two">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">Company Name: </label>
                                            <input class="form-control" id="text" name="companyname"
                                                   placeholder="Enter Company name "
                                                   type="text"/>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- End Row -->




                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Phone:</label>
                                        <input class="form-control" id="" placeholder="Mobile Phone" name="mobilePhone"
                                               type="number" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Office Phone:</label>
                                        <input class="form-control" id="" placeholder="Office Phone" name="officePhone"
                                               type="number">
                                    </div>
                                </div>


                            </div>
                            @if(Auth::user())


                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">
                                                <h2 class="form-heading text-center wow fadeInDown">Customer Portal Details</h2>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group ">
                                            <label class="control-label " for="text">Your Name</label>
                                            <input class="form-control" id="text" name="name"
                                                   placeholder="Enter your name here"
                                                   type="text" required/>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">
                                                Email
                                            </label>
                                            <input class="form-control" id="text" name="email"
                                                   placeholder="Type your email here"
                                                   type="email" required/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">
                                                Password
                                            </label>
                                            {{--<div class="col-md-6">--}}
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="Password" name="password" required>
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-confirm" class="control-label">Confirm Password</label>

                                            {{--<div class="col-md-6">--}}
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="Confirm Password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>


                            @endif



                            {{--    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">
                                                Password
                                            </label>
                                            --}}{{--<div class="col-md-6">--}}{{--
                                            <input id="password-confirm" type="password" class="form-control" name="password" required>
                                            --}}{{--</div>--}}{{--
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-confirm" class="control-label">Confirm Password</label>

                                            --}}{{--<div class="col-md-6">--}}{{--
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">Company Name</label>
                                            <input class="form-control" id="text" name="Companyname" placeholder="Enter Company name "
                                                   type="text" />
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Office Phone:</label>
                                            <input class="form-control" id="" name="officePhone" type="number" required>
                                        </div>
                                    </div>


                                </div> <!-- End Row -->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mobile Phone:</label>
                                            <input class="form-control" id="" name="mobilePhone" type="number" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label " for="text">
                                                Email
                                            </label>
                                            <input class="form-control" id="text" name="email" placeholder="type your email here"
                                                   type="email" required/>
                                        </div>
                                    </div>


                                </div> <!-- End Row -->--}}


                            <div class="row">
                                <h2 class="form-heading text-center wow fadeInDown">Billing Address</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Street:</label>
                                        <input class="form-control" placeholder="Street" name="billing_street">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">City:</label>
                                        <input class="form-control" placeholder="City" name="city">
                                    </div>
                                </div>
                            </div> <!-- End Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">State or Province:</label>
                                        <input class="form-control" placeholder="State or Province" name="province">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Zip code:</label>
                                        <input class="form-control" placeholder="Zip Code" name="zipcode">
                                    </div>
                                </div>
                            </div> <!-- End Row -->
                            {{--    <div class="form-group">
                                    <label class="control-label">Location:</label>


                                    <input type="text" name="billinglocation" placeholder="Billing Location" required
                                           class="form-control"/>


                                    --}}{{-- <div class="col-sm-10" style="display: none">
                                         <div class="m-t-small">
                                             <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                                             <div class="col-sm-3">
                                                 <input type="text" name="lat" class="form-control" id="us3-lat"/>
                                             </div>
                                             <label class="p-r-small col-sm-2 control-label">Long.:</label>

                                             <div class="col-sm-3">
                                                 <input type="text" name="long" class="form-control" id="us3-lon"/>
                                             </div>
                                         </div>
                                     </div>--}}{{--

                                </div>--}}

                            <div class="form-group">
                                <div class="">
                                    {{--   <div id="us9" style="width: 100%; height: 400px; position: relative; overflow: hidden;">

                                       </div>--}}
                                    <p></p>

                                </div>
                                <div class="">

                                    <div class="form">

                                        <!--
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Country:</label>
                                                                                            <input class="form-control" id="us9-country" disabled="disabled">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>  End Row -->

                                        <!--
                                        <div class="row form-group"> -->
                                        <!-- <div class="col-md-1"><input type="checkbox" name="terms" id="terms"> </div> -->
                                    <!--  <div class="col-md-12 term-condis">  <p><input type="checkbox" name="terms" id="terms"><strong><a href="{{route('terms')}}">I Agree Terms & Coditions </a> </strong> </p></div>

                                        </div>
                                        <span class="help-block checked">
                                                <strong>It is Required</strong>
                                            </span>
                                            -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <h2 class="form-heading text-center wow fadeInDown">Job Site Address</h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Street:</label>
                                        <input class="form-control" placeholder="Street" id="us4-street1" name="job_street">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">City:</label>
                                        <input class="form-control" name="job_city" id="us4-city" placeholder="City">
                                    </div>
                                </div>
                            </div> <!-- End Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">State or Province:</label>
                                        <input class="form-control" placeholder="State or Province"  id="us4-state"  name="job_province">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Postal code:</label>
                                        <input class="form-control" id="us4-zip" name="job_zipcode"
                                               placeholder="Zip Code">
                                    </div>
                                </div>


                                <div class="col-md-12">

                                    <h2 class="form-heading text-center wow fadeInDown" style="font-size: 20px;"> Please Enter you address and confirm jobsite location on map </h2>

                                    <div class="form-group">
                                        <label class="control-label">Location:</label>


                                        <input type="text" name="location" placeholder="Location" required
                                               class="form-control" id="us4-address"/>


                                        <div class="col-sm-10" style="display: none">
                                            <div class="m-t-small">
                                                <label class="p-r-small col-sm-1 control-label">Lat.:</label>

                                                <div class="col-sm-3">
                                                    <input type="text" name="lat" class="form-control" id="us4-lat"/>
                                                </div>
                                                <label class="p-r-small col-sm-2 control-label">Long.:</label>

                                                <div class="col-sm-3">
                                                    <input type="text" name="long" class="form-control" id="us4-lon"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="us4" style="width: 100%; height: 400px; position: relative; overflow: hidden;">

                                    </div>
                                    <p></p>

                                </div>

                            </div> <!-- End Row -->


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nearest Cross Street:</label>
                                        <input class="form-control" placeholder="Nearest Cross Street"
                                               name="crossStreet" id="crossStreet">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="select">
                                            Select County
                                        </label>
                                        <select class="select form-control" id="select" name="country">
                                            <option value="MA-Middlesex, Essex, Suffolk&nbsp;">
                                                MA-Middlesex, Essex, Suffolk&nbsp;
                                            </option>
                                            <option value="MA-Norfolk, Bristol, Plymouth&nbsp;">
                                                MA-Norfolk, Bristol, Plymouth&nbsp;
                                            </option>
                                            <option value="MA- Berkshire, Franklin, Hampshire, Hampden&nbsp;">
                                                MA- Berkshire, Franklin, Hampshire, Hampden&nbsp;
                                            </option>
                                            <option value="MA-Barnstable&nbsp;">
                                                MA-Barnstable&nbsp;
                                            </option>
                                            <option value="RI-Providence, Kent, Bristol&nbsp;">
                                                RI-Providence, Kent, Bristol&nbsp;
                                            </option>
                                            <option value="RI-Washington, Newport">
                                                RI-Washington, Newport
                                            </option>
                                            <option value="NH-Hillsborough, Rockingham&nbsp;">
                                                NH-Hillsborough, Rockingham&nbsp;
                                            </option>
                                            <option value="NH-Cheshire">
                                                NH-Cheshire
                                            </option>
                                        </select>
                                    </div>
                                </div>


                            </div> <!-- End Row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Job Site Contact Name:</label>
                                        <input class="form-control" name="jobsiteContactNaame"
                                               placeholder="Job Site Contact Name" id="job-siteContactNaame">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Job Site Contact Number:</label>
                                        <input class="form-control" type="number" id="jobsiteContactNumber"
                                               placeholder="Job Site Contact Number" name="jobsiteContactNumber">
                                    </div>
                                </div>

                            </div> <!-- End Row -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">How large is area in Square feet?</label>
                                        <input class="form-control" id=""
                                               placeholder="How large is area in Square feet?">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="select1">
                                            Type of Markings
                                        </label>
                                        <select class="select form-control" id="select1" name="marking">
                                            <option value="Marked up Paper Grids">
                                                Marked up Paper Grids
                                            </option>
                                            <option value="Paint ">
                                                Paint
                                            </option>
                                            <option value="Paint &amp; Flags">
                                                Paint &amp; Flags
                                            </option>
                                            <option value="Marker">
                                                Marker
                                            </option>
                                            <option value="Chalk or Crayon">
                                                Chalk or Crayon
                                            </option>
                                            <option value="None">
                                                None
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label ">
                                            What need to be scanned?
                                        </label>
                                        <div class=" ">
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" value="surface"/>
                                                    surface
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" value="Floor"/>
                                                    Floor
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" value="Wall"/>
                                                    Wall
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" value="Ceiling"/>
                                                    Ceiling
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" value="Colum/Pilar"/>
                                                    Colum/Pilar
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                {{--   <label class="checkbox">
                                                       <input name="item[]" type="checkbox" value="Other"/>
                                                       Other
                                                   </label>--}}
                                                <label class="checkbox">
                                                    <input name="item[]" type="checkbox" id="checkOther2"
                                                           value="other ">
                                                    other
                                                    <input type="text" name="item[]" id="addition-info2"
                                                           style="display:none;">
                                                </label>


                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label ">
                                            What Type of Report?
                                        </label>
                                        <div class=" ">
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Marking on Ground"/>
                                                    Marking on Ground
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Depth Slice Report"/>
                                                    Depth Slice Report
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Mini Report"/>
                                                    Mini Report
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox"
                                                           value="Drill  Locator Report "/>
                                                    Drill Locator Report
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Photos"/>
                                                    Photos
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input  name="report[]" type="checkbox"
                                                            value="None"/>
                                                    None
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Not Sure"/>
                                                    Not Sure
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                {{--    <label class="checkbox">
                                                        <input name="report[]" type="checkbox" id="co" value="Other"/>
                                                        Other
                                                        <input type="text" name="new_textbox" id="ai" style="display:none;">
                                                    </label>--}}

                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" id="checkOther3"
                                                           value="other ">
                                                    other
                                                    <input type="text" name="report[]" id="addition-info3"
                                                           style="display:none;">
                                                </label>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label " for="select2">
                                            What utility do you need located?
                                        </label>
                                        <div class="">
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Target">
                                                    Target
                                                </label>


                                            </div>



                                            {{--   <div class="checkbox">
                                                   <label class="checkbox">
                                                       <input name="terrain[]" type="checkbox" value="Utility">
                                                       Utility
                                                   </label>
                                               </div>--}}


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Electric">
                                                    Electric
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Communications">
                                                    Communications
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Gas">
                                                    Gas
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Water">
                                                    Water
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Sewer">
                                                    Sewer
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Drainage">
                                                    Drainage
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox"
                                                           value="Well-Electric & water">
                                                    Well-Electric & water
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Tanks (UST)">
                                                    Tanks (UST)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="Voids">
                                                    Voids
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" value="All">
                                                    All
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="terrain[]" type="checkbox" id="checkOther5"
                                                           value="other ">
                                                    other
                                                    <input type="text" name="terrain[]" id="addition-info5"
                                                           style="display:none;">
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div> <!-- End Row -->


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label " for="select5">
                                            How Thick is the slab?
                                        </label>
                                        <input type="text" class="form-control" placeholder="How Thick is the slab?"
                                               id="select5" name="slab">

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="select7">
                                            Are there Steel Fiber in cement&nbsp;?
                                        </label>
                                        <select class="select form-control" id="select7" name="fiber">
                                            <option value="No">
                                                No
                                            </option>
                                            <option value="Yes">
                                                Yes
                                            </option>
                                            <option value="Unknown">
                                                Unknown
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="select9">
                                            How old is poor or concrete?&nbsp;
                                        </label>
                                        <input class="select form-control" placeholder="How old is poor or concrete"
                                               id="select9" name="condition">
                                    </div>
                                </div>
                            </div> <!-- End Row -->


                            <div class="form-group ">
                                <label class="control-label " for="select10">
                                    Is area Clean and Clear?
                                </label>
                                <select class="select form-control" id="select10" name="clean">
                                    <option value="Yes">
                                        Yes
                                    </option>
                                    <option value="No">
                                        No
                                    </option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label class="control-label " for="message">
                                    Please Describe Surface Conditions
                                </label>
                                <textarea class="form-control" cols="40" id="message" name="message"
                                          rows="10"></textarea>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="select11">
                                            Do you have as built drawings?
                                        </label>
                                        <select class="select form-control" id="select11" name="drawings">
                                            <option value="No">
                                                No
                                            </option>
                                            <option value="Yes">
                                                Yes
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="date">
                                            When do you need located completed?
                                        </label>
                                        <input class="form-control" autocomplete="off" id="date" name="delivery_date"
                                               placeholder="MM/DD/YYYY"
                                               type="text"/>
                                    </div>
                                </div>
                            </div> <!-- End Row -->


                            <div class="form-group">
                                <label class="control-label" for="filebutton">Attach file</label>
                                <input id="filebutton" name="image[]" class="input-file" type="file" multiple>
                            </div>


                            <div class="form-group ">
                                <label class="control-label " for="newsletter">
                                    Subscribe to promotional email and newsletters
                                </label>
                                <select class="select form-control" id="select9" name="newsletter">
                                    <option value="Yes">
                                        Yes
                                    </option>
                                    <option value="No">
                                        No
                                    </option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label ">
                                            Where is work located?
                                        </label>
                                        <div class=" ">
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="located[]" type="checkbox" value="Inside">
                                                    Inside
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="located[]" type="checkbox" value="Outside">
                                                    Outside
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="located[]" type="checkbox" value="Both">
                                                    Both
                                                </label>
                                            </div>


                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="located[]" type="checkbox" id="checkOthers"
                                                           value="other ">
                                                    other
                                                    <input type="text" name="located[]" id="addition-info"
                                                           style="display:none;">
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label ">
                                            What Type of Report?
                                        </label>
                                        <div class=" ">
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Marking on Ground">
                                                    Marking on Ground
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Depth Slice Report">
                                                    Depth Slice Report
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Mini Report">
                                                    Mini Report
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox"
                                                           value="Drill  Locator Report">
                                                    Drill Locator Report
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Photos">
                                                    Photos
                                                </label>
                                            </div>

                                            <div class="checkbox ">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="None">
                                                    None
                                                </label>
                                            </div>

                                            <div class="checkbox ">
                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" value="Not Sure">
                                                    Not Sure
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                {{-- <label class="checkbox">
                                                     <input name="report[]" type="checkbox" id="to" value="other ">
                                                     other
                                                     <input type="text" name="report[]" id="ti" style="display:none;">
                                                 </label>--}}

                                                <label class="checkbox">
                                                    <input name="report[]" type="checkbox" id="checkOther1"
                                                           value="other ">
                                                    other
                                                    <input type="text" name="report[]" id="addition-info1"
                                                           style="display:none;">
                                                </label>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="control-label " for="textarea1">
                                    What type of work are you doing &amp; where on property?
                                </label>
                                <textarea class="form-control" cols="40" id="textarea1" name="about_property"
                                          placeholder="Please describe" rows="10"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">


                                    <h2 class="form-heading text-center wow fadeInDown"><label class="control-label "
                                                                                               for="textarea1"></label>

                                        <label class="control-label " for="textarea1">

                                            Additional Information
                                        </label></h2>
                                    <textarea class="form-control" cols="40" id="textarea1" name="additionalinformation"
                                              placeholder="Additional Information" rows="10"></textarea>

                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label class="control-label " for="name">
                                            Promo Code
                                        </label>
                                        <input class="form-control"  id="promocoder" name="promocode" placeholder="Promo Code" type="text"/>
                                        <input type="hidden" id="checkApply" value="0" name="promocodechecker">
                                        <button id="promocodecheck" style="margin-top: 15px;">Apply Promo code </button>
                                        <div id="error-show" style="font-size: 20px; color: red;margin-top: 15px;"></div>

                                    </div>

                                </div>
                            </div>


                            <div class="row form-group">
                                <!-- <div class="col-md-1"><input type="checkbox" name="terms" id="terms" required> </div> -->
                                <div class="col-md-12 term-condis"><p><input type="checkbox" name="terms" id="terms"
                                                                             data-toggle="modal"
                                                                             data-target="#cementModal"
                                                                             required><strong><a href="#"
                                                                                                 style="cursor: default;pointer-events: none;">
                                                I Agree to the Terms & Conditions </a> </strong></p></div>
                            </div>


                            <button type="submit" class="btn btn-info btn-lg" id="submit_form">
                                Register
                            </button>
                            <button type="submit" class="btn btn-info btn-lg" id="submitting">
                                Submitting...
                            </button>

                        </form>
                        <form action="/paypal/express-checkout" method="post" id="paypal" style="">
                            {{ Form::token() }}
                            <input type="hidden" name="name" value="cement_service">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="price" id="paypalprice" value="">
                            <input type="hidden" name="hosted_button_id" value="P22Q8EZ7YNNV8">
                            <input type="hidden" name="project_id" id="paypalid" value="">
                            <button type="submit" class="custom-paypal-img">PAY NOW<img src="../img/payapa-logo.png">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>

        $(document).ready(function () {
            $('.checked').hide();
            $('#paypal').hide();
            $('#submitting').hide();


            $('#accept_button').click(function () {
                if ($('#approve').val() == '' && $('#date').val() == '') {
                    $('#error').html('Please fill the Fields');
                } else {

                    $('.close').modal('toggle');
                    $('#cementModal').modal('toggle');
                }
            });


            $(".checkbox input").click(function () {

                if ($(".checkbox #checkOthers").is(':checked')) {
                    $("#addition-info").show();
                } else {
                    $("#addition-info").hide();
                }


            });

            $(".checkbox input").click(function () {

                if ($(".checkbox #checkOther5").is(':checked')) {
                    $("#addition-info5").show();
                } else {
                    $("#addition-info5").hide();
                }


            });

            $(".checkbox input").click(function () {

                if ($(".checkbox #checkOther1").is(':checked')) {
                    $("#addition-info1").show();
                } else {
                    $("#addition-info1").hide();
                }


            });

            $(".checkbox input").click(function () {

                if ($(".checkbox #checkOther3").is(':checked')) {
                    $("#addition-info3").show();
                } else {
                    $("#addition-info3").hide();
                }


            });
            $(".checkbox input").click(function () {

                if ($(".checkbox #checkOther2").is(':checked')) {
                    $("#addition-info2").show();
                } else {
                    $("#addition-info2").hide();
                }


            })

        });

        $(document).ready(function () {
            $(".checkbox input").click(function () {


                if ($(".checkbox #co").is(':checked')) {
                    $("#ai").show();
                } else {
                    $("#ai").hide();
                }

                if ($(".checkbox #checkOthers").is(':checked')) {
                    $("#addition-info").show();
                } else {
                    $("#addition-info").hide();
                }

                if ($(".checkbox #to").is(':checked')) {
                    $("#ti").show();
                } else {
                    $("#ti").hide();
                }


            })


        });

        $(document).ready(function() {
            $('#promocodecheck').click(function (e) {
                e.preventDefault();
                var promocode = $('#promocoder').val();
                $.ajax({
                    type: 'get',
                    url: '/promocode_exist',
                    data: {promocode: promocode},

                    success: function (data) {
                        //console.log(data);
                        if (data.code == promocode && data.status == 1) {
                            $('#error-show').html('Applied');
                            $('#promocodecheck').hide();
                            var amount = $('#text[name=price]').val()
                            amount = amount - data.amount;
                            var promocodechecker = "1";
                            $('#checkApply[name=promocodechecker]').val(promocodechecker);
                            $('#text[name=price]').val(amount);
                        } else {
                            $('#error-show').html('Not Valid Promocode');
                            $('#promocodecheck').hide();
                        }
                    }
                });
            });
            $('#submitting').hide();
            $('.checked').hide();
            $('#paypal').hide();
            $('#accept_button').click(function(){
                $('.close').modal('toggle');
                $('#esModal').modal('toggle');
            });

            $(".checkbox input").click(function(){

                if ( $(".checkbox #checkOthers").is(':checked') ) {
                    $("#addition-info").show();
                }
                else{
                    $("#addition-info").hide();
                }
            });

            $(".checkbox input").click(function(){

                if ( $(".checkbox #checkOtherss").is(':checked') ) {
                    $("#addition-infos").show();
                }
                else{
                    $("#addition-infos").hide();
                }

            });

            $("#cement_form").submit(function (e) {
//            $('#paypal').show();
  e.preventDefault();
                var check = $('input[name=terms]').is(':checked');
                if (check == false) {
                    $("#myModal").modal('hide');
                    $('.checked').show();
                } else {
                    $('#submitting').show();
                    $('#submit_form').hide();
                    var action = $('#cement_form').attr('action');
                    var register = $('#form_login :input');
                    var url = '';
                    var data = {};
                    var myform = document.getElementById("cement_form");
                    var data = new FormData(myform);
                    $(register).each(function () {
                        data[this.name] = $(this).val();
                    });
                    $.ajax({
                        url: action,
                        data: data,
                        cache: false,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data, status) {
                            if (status == 'success') {
                                console.log(data);
                                var response = data;
                                var price = response.price;
                                var pid = response.id;
                                $("#paypalprice").val(price);
                                $("#paypalid").val(pid);
                                $("#paypal").submit();
                            } else {
                                alert('The Email already exist.Please login and try again!');
                            }
                        }
                    });

                }

            });

        });



        /*

                $("#cement_form").submit(function (e) {
                    e.preventDefault();

        //            $('#paypal').show();
                    var check = $('input[name=terms]').is(':checked');
                    if (check == false) {
                        $("#myModal").modal('hide');
                        $('.checked').show();
                    } else {
                        $('#submitting').show();
                        $('#submit_form').hide();
                        var action = $('#cement_form').attr('action');
                        var register = $('#form_login :input');

                        var myform = document.getElementById("cement_form");
                        var data = new FormData(myform);

                        $(register).each(function () {
                            data[this.name] = $(this).val();
                        });

                        $.ajax({
                            url: action,
                            data: data,
                            cache: false,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function (data, status) {
                                if (status == 'success') {
                                    var response = data;

                                var price = response.price;
                                var pid = response.id;
                                $("#paypalprice").val(price);
                                $("#paypalid").val(pid);
                                $("#paypal").submit();

                                 /!*   var response = data;
                                    var price = response.price;
                                    var pid = response.id;
                                    $("#paypalprice").val(price);
                                    $("#paypalid").val(pid);
                                    $("#paypal").submit();*!/

                                } else {
                                    alert('The Email already exist.Please login and try again!');
                                }
                            }
                        });

                    }
                });

        */



    </script>
@endsection