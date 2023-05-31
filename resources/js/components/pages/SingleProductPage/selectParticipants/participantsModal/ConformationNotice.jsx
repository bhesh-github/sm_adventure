import React from 'react';
import { ImPushpin } from 'react-icons/im';
import { AiOutlineForm } from 'react-icons/ai';
import { BsHourglassSplit } from 'react-icons/bs';

const ConformationNotice = ({ item }) => {
	const { title, type, format, note } = item;
	const typeIcon = {
		voucherConformation: <AiOutlineForm />,
		bookingConformation: <BsHourglassSplit />,
	};

	const icon = typeIcon[type];
	return (
		<div className="conformation-content">
			<h6 className="more-info-title">
				<ImPushpin className="pushpin-icon" />
				{title}
			</h6>
			<h6 className="format">
				{icon} {format}
			</h6>
			<h6 className="note">{note}</h6>
		</div>
	);
};

export default ConformationNotice;
