import React from 'react';
import { useState, useMemo, useEffect } from 'react';
import 'react-datepicker/dist/react-datepicker.css';
import ParticipantsModal from './participantsModal/ParticipantsModal';
import SelectParticipantsBadge from './SelectParticipantsBadge';

const userInput = {
	fullName: '',
	email: '',
	contact: '',
	emergency: '',
	address: '',
	tourDate: new Date(),
	adult: null,
	children: null,
	infant: null,
	totalAmount: null,
};

const SelectParticipants = ({ individualAmountData }) => {
	const calculatedIndividualAmountObj = {
		adult: individualAmountData.adult,
		children: null,
		infant: null,
	};
	const [overlay, setOverlay] = useState(false);
	const [forType, setFormType] = useState(null);
	const [bookingConformationInputValue, setBookingConformationInputValue] =
		useState(userInput);
	const [calculatedIndividualAmount, setCalculatedIndividualAmount] = useState(
		calculatedIndividualAmountObj
	);
	const [tourTotalAmount, setTourTotalAmount] = useState(0);

	const calculateAmountFunc = () => {
		const result =
			calculatedIndividualAmount.adult +
			calculatedIndividualAmount.children +
			calculatedIndividualAmount.infant;
		setTourTotalAmount(result);
	};
	useMemo(() => {
		return calculateAmountFunc();
	}, [bookingConformationInputValue]);

	useEffect(() => {
		setBookingConformationInputValue((prev) => ({
			...prev,
			totalAmount: tourTotalAmount,
		}));
	}, [tourTotalAmount]);

	const dataAssumption = [
		{ id: 0, title: 'Tour Date', type: 'date', value: 'abc' },
		{ id: 1, title: 'Adult', type: 'button', value: 'abc' },
		{ id: 2, title: 'Children', type: 'button', value: 'abc' },
		{ id: 3, title: 'Infant 0-3 yrs', type: 'button', value: 'abc' },
		{
			id: 4,
			title: 'Total Amount',
			type: 'text',
			value: tourTotalAmount.toString(),
		},
	];
	return (
		<>
			<div className="select-participants-wrapper ">
				<div className="select-participants-heading">Tour Rate</div>
				<div className="table-and-button-wrapper row">
					<div className="select-participants-table">
						{dataAssumption.map((item) => (
							<SelectParticipantsBadge
								item={item}
								bookingConformationInputValue={bookingConformationInputValue}
								setBookingConformationInputValue={
									setBookingConformationInputValue
								}
								calculatedIndividualAmount={calculatedIndividualAmount}
								setCalculatedIndividualAmount={setCalculatedIndividualAmount}
								individualAmountData={individualAmountData}
								key={item.id}
							/>
						))}
					</div>
					<div className="buttons-wrapper">
						<button
							className="participants-button book-now"
							onClick={() => {
								setOverlay(true);
								setFormType('bookNow');
							}}
						>
							Book Now
						</button>
						<button
							className="participants-button more-info"
							onClick={() => {
								setOverlay(true);
								setFormType('moreInfo');
							}}
						>
							More Info
						</button>
					</div>
					<div className="participants-modal">
						<ParticipantsModal
							type={forType}
							overlay={overlay}
							setOverlay={setOverlay}
							bookingConformationInputValue={bookingConformationInputValue}
							setBookingConformationInputValue={
								setBookingConformationInputValue
							}
						/>
					</div>
					{/* <div className="participants-modal">
						<ParticipantsModal
							type={forType}
							overlay={overlay}
							setOverlay={setOverlay}
							setBookingConformationInputValue={
								setBookingConformationInputValue
							}
						/>
					</div> */}
				</div>
			</div>
		</>
	);
};

export default SelectParticipants;

SelectParticipants.defaultProps = {
	individualAmountData: {
		adult: 10000,
		children: 5000,
		infant: 3000,
	},
};
