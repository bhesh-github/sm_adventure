import React from "react";
import FooterSection1 from "./FooterSection1";
import FooterSection2 from "./FooterSection2";

const Footers = ({ footerList }) => {
  return (
    <div className="footers">
      <FooterSection1 footerList={footerList} />
      <FooterSection2 />
    </div>
  );
};

export default Footers;

Footers.defaultProps = {
  footerList: [
    {
      id: 0,
      title: "Top Tour",
      list: [
        "Capital Highlights Tour",
        "Kathmandu Mountain Tour",
        "Muktinath Darshan Tour",
        "NEPAL COMBO HIGHLIGHTS",
        "Sirubari Village Tour",
      ],
    },
    {
      id: 1,
      title: "Top Trekking",
      list: [
        "Annapurna Base Camp Trek",
        "Dolpo Trekking",
        "Ghorepani Poonhill Trek",
        "Langtang Trek",
        "Makalu Trekking",
      ],
    },
    {
      id: 2,
      title: "Quick Links",
      list: [
        "FAQ",
        "Booking Condition",
        "Visa Information",
        "General Information",
        "Indian citizens",
      ],
    },
    {
      id: 3,
      title: "Contact",
      list: {
        tel: "01-4427892 /4424953",
        address: "Nag Pokhari, Kathmandu, Nepal ",
        imgUrl:
          "https://sealinkstravel.com/wp-content/uploads/2020/03/we-accept.png",
      },
    },
  ],
};
