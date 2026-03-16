use strict;

sub get_data {
  my $data = [
    {
      subject => 'Odaiba Gundam (with issues)!',
      image   => '<IMG src="DSC00486.JPG">',
      from    => 'banzai',
      bidding_price => '15,500 JPY',
      bidder  => '8',
      days    => '2 days',
    },
    {
      subject => 'Bicycle from Italy ◆ Like New',
      image   => '<IMG src="DSC09057.JPG">',
      from    => 'jitensya',
      bidding_price => '50,000 JPY',
      bidder  => '15',
      days    => '3 hours',
    },
    {
      subject => 'U.S. PC ◆ Junk Item',
      image   => '<IMG src="DSC08954.JPG">',
      from    => 'pineapple',
      bidding_price => '3,000 JPY',
      bidder  => '3',
      days    => '4 days',
    },



  ];

  $data->[2]->{body} = <<END_OF_BODY;
END_OF_BODY

  return $data;
}

1;
