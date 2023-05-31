import { RxCrossCircled } from 'react-icons/rx';
import { ImPushpin } from 'react-icons/im';
import ConformationNotice from './ConformationNotice';
import BookingPolicy from './BookingPolicy';

const conformationNoticeData = [
	{
		id: 0,
		title: 'Voucher Conformation',
		type: 'voucherConformation',
		format: 'Mobile Voucher',
		note: 'We will send a digital conformation voucher to your email address. Use your phone or Print your Voucher',
	},
	{
		id: 1,
		title: 'Booking Confirmation',
		type: 'bookingConformation',
		format: '24hrs Required for Confirmation',
		note: 'Confirmation within 24hrs',
	},
];

const bookingPolicyData = [
	{
		id: 0,
		title: 'Cancellation Policy',
		policy: [
			'In case Tours or Tickets cancelled after Booking 100 % charges will be applicable.',
			'In case Tours or Tickets cancelled after Booking 100 % charges will be applicable.',
		],
	},
	{
		id: 1,
		title: 'Child Policy',
		policy: [
			'Children between 0 to 3 years of age are considered infant and are NOT allowed',
			'Children above the age of 3 will be charged same as adult',
			'Children between 0 to 3 years of age are considered infant and are NOT allowed',
		],
	},
];

function ParticipantsModal({
	type,
	overlay,
	setOverlay,
	setBookingConformationInputValue,
	bookingConformationInputValue,
}) {
	const d = bookingConformationInputValue.tourDate;
	const month = Number(d.getMonth()) + 1;
	const displayDate = +month + '/' + d.getDate() + '/' + d.getFullYear();
	const toggleOverlay = (value) => {
		setOverlay(value);
	};

	overlay
		? (document.body.style.overflowY = 'hidden')
		: (document.body.style.overflowY = 'scroll');

	return (
		<>
			{overlay && (
				<div
					className="overlay"
					// onClick={() => {
					// 	toggleOverlay(false);
					// }}
				>
					{type === 'bookNow' ? (
						<div className="modal-comp">
							<div className="head">
								<h4 className="heading">Booking Conformation</h4>
							</div>
							<div className="body">
								<div className="content-wrapper">
									<div className="form-group">
										<form>
											<div className="row">
												<div className="col-md-12 mb-2">
													<div className="form-group">
														<label htmlFor="fullName">Full Name :</label>
														<input
															type="text"
															value={bookingConformationInputValue.fullName}
															name="fullName"
															className="form-control"
															onChange={(e) => {
																setBookingConformationInputValue((prev) => ({
																	...prev,
																	fullName: e.target.value,
																}));
															}}
														/>
													</div>
												</div>
												<div className="col-md-12 mb-2">
													<div className="form-group">
														<label htmlFor="email">Email :</label>
														<input
															type="text"
															value={bookingConformationInputValue.email}
															name="email"
															className="form-control"
															onChange={(e) =>
																setBookingConformationInputValue((prev) => ({
																	...prev,
																	email: e.target.value,
																}))
															}
														/>
													</div>
												</div>
												<div className="col-md-6 mb-2">
													<div className="form-group">
														<label htmlFor="contactNumber">Contact No : </label>
														<input
															type="text"
															value={bookingConformationInputValue.contact}
															name="contactNumber"
															className="form-control"
															onChange={(e) => {
																setBookingConformationInputValue((prev) => ({
																	...prev,
																	contact: e.target.value,
																}));
															}}
														/>
													</div>
												</div>
												<div className="col-md-6 mb-2">
													<div className="form-group">
														<label htmlFor="emergencyNumber">Emergency :</label>
														<input
															type="text"
															value={bookingConformationInputValue.emergency}
															name="emergencyNumber"
															className="form-control"
															onChange={(e) => {
																setBookingConformationInputValue((prev) => ({
																	...prev,
																	emergency: e.target.value,
																}));
															}}
														/>
													</div>
												</div>
												<div className="col-md-12 mb-2">
													<div className="form-group">
														<label htmlFor="address">Address : </label>
														<input
															type="text"
															value={bookingConformationInputValue.address}
															name="address"
															className="form-control"
															onChange={(e) => {
																setBookingConformationInputValue((prev) => ({
																	...prev,
																	address: e.target.value,
																}));
															}}
														/>
													</div>
												</div>
												<div className="selected-view">
													Tour Date :
													<span className="display-value">
														{' ' + displayDate}
													</span>
												</div>
												<div className="selected-view">
													Adult :{' '}
													<span className="display-value">
														{bookingConformationInputValue.adult === null
															? 1
															: bookingConformationInputValue.adult}
													</span>
												</div>
												<div className="selected-view">
													Children :{' '}
													<span className="display-value">
														{bookingConformationInputValue.children}
													</span>
												</div>
												<div className="selected-view">
													Infant 0-3 yrs :{' '}
													<span className="display-value">
														{bookingConformationInputValue.infant}
													</span>
												</div>
												<h5 className="selected-view">
													Total Amount : Nrs.{' '}
													<span className="display-value">
														{bookingConformationInputValue.totalAmount}/-
													</span>
												</h5>
											</div>
										</form>
									</div>
								</div>
								<div className="buttons">
									<button
										className="button sumbit-btn"
										onClick={() => {
											toggleOverlay(false);
										}}
									>
										Submit
									</button>
									<button
										className="button"
										onClick={() => {
											toggleOverlay(false);
										}}
										a
									>
										Cancel
									</button>
								</div>
							</div>
							<RxCrossCircled
								className="close-button"
								onClick={() => {
									toggleOverlay(false);
								}}
							/>
						</div>
					) : (
						<div className="modal-comp">
							<div className="head">
								<h4 className="heading">More Information</h4>
							</div>
							<div className="body">
								<div className="content-wrapper">
									{conformationNoticeData.map((item) => (
										<ConformationNotice item={item} key={item.id} />
									))}
									<div className="booking-policy-wrapper">
										<h6 className="more-info-title">
											<ImPushpin className="pushpin-icon" /> Booking Policy
										</h6>
										{bookingPolicyData.map((item) => (
											<BookingPolicy policyData={item} key={item.id} />
										))}
									</div>
									<div className="summary">
										<strong>Lorem</strong> Ipsum is simply dummy text of the
										printing and typesetting industry. Lorem Ipsum has been the
										industry's standard dummy text ever since the 1500s, when an
										unknown printer took a galley of type and scrambled it to
										make a type specimen book. It has survived not only five
										centuries, but also the leap into electronic typesetting,
										remaining essentially unchanged. It was popularised in the
										1960s with the release of Letraset sheets containing Lorem
										Ipsum passages, and more recently with desktop publishing
										software like Aldus PageMaker including versions of Lorem
										Ipsum.
									</div>
									<div className="buttons">
										<button
											className="button"
											onClick={() => {
												toggleOverlay(false);
											}}
										>
											Close
										</button>
									</div>
								</div>
							</div>
							<RxCrossCircled
								className="close-button"
								onClick={() => {
									toggleOverlay(false);
								}}
							/>
						</div>
					)}
				</div>
			)}
		</>
	);
}

export default ParticipantsModal;
