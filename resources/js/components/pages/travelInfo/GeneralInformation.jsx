import React from "react";

const GeneralInformation = ({ generalInfoData }) => {
  const infoRow = generalInfoData.map((item) => (
    <div className="general-info-row" key={item.id}>
      <h4 className="general-info-title">{item.title}</h4>
      <p className="discription">{item.discription}</p>
    </div>
  ));
  return (
    <>
      <div className="general-info-page">
        <img
          src="https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg"
          alt="banner-image"
          className="banner-image"
        />
        <div className="info-section container">
          {infoRow}
          <div className="note">
            <strong>NOTE:</strong> Please do not tip with coins or notes of or
            less than NPRS 50, or dirty and ripped notes. This is regarded
            culturally as an insult.
          </div>
        </div>
      </div>
    </>
  );
};

export default GeneralInformation;

GeneralInformation.defaultProps = {
  generalInfoData: [
    {
      id: 0,
      title: "Hotel porters",
      discription:
        "NPR50-100 is adequate for porters that assist you with bags to your room.",
    },
    {
      id: 1,
      title: "Restaurants",
      discription:
        "Please check the bill and if there is an addition of 10% service charge, there is no requirement for tipping. Otherwise, 5-10% of the total bill amount is appropriate.",
    },
    {
      id: 2,
      title: "Local guides",
      discription:
        "Throughout your trip, you may at times have a local guide in addition to your leader. We suggest US$4-5 per person, per day for local guides. (Including city tour guides, jungle guides, rafting guides, assistant trek guides)",
    },
    {
      id: 3,
      title: "Porters",
      discription:
        "Throughout your trip, you may at times have a porter in addition to your leader. We suggest US$4-5 per person, per day, per porter.",
    },
    {
      id: 4,
      title: "Drivers",
      discription:
        "You may have a range of drivers on your trip. Some may be with you for a short journey while others may be with you for several days. We would suggest a higher tip for those more involved with the group however, a base of US$4-5 per person, per day is generally appropriate.",
    },
    {
      id: 5,
      title: "Local transport",
      discription: "For a city tour, we suggest US$3 per person, per day.",
    },
    {
      id: 6,
      title: "Your Group Leader",
      discription:
        "You may also consider tipping your leader for outstanding service throughout your trip. The amount is entirely a personal preference; however, as a guideline US$4-5 per person, per day can be used. Of course, you are free to tip more or less, as you see fit, depending on your perception of service quality and the length of your trip. Remember, a tip is not compulsory and should only be given when you receive excellent service.",
    },
  ],
};
