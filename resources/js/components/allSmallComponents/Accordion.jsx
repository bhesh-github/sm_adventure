import React from 'react';

const Accordion = () => {
	return (
		<div className="accordion-wrapper">
			<div className="accordion">
				<div className="list">
					<input type="radio" name="accordion" id="first" />
					<label htmlFor="first" className="side-bar-item">
						Information
					</label>
					<div className="content">Top Outbound</div>
				</div>
			</div>
		</div>
	);
};

export default Accordion;
