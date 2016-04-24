<?PHP

	/*****

		@Author Adam Cox

		This bot is used to test the integrity of the Adapter for each exchange.

	 *****/

	function run_tests( $Adapters, $Tester )
	{
		foreach( $Adapters as $Adapter ) {
			echo "******* " . get_class( $Adapter ) . " ******\n";

			echo " -> getting currencies\n";
			$currencies = $Adapter->get_currencies();
			$Tester->test( 'currencies', array( $currencies ) );

			echo " -> getting markets\n";
			$markets = $Adapter->get_markets();
			$Tester->test( 'markets', array( $markets ) );

			echo " -> getting first market to test with\n";
			$market = $markets[0];//first market is good enough for some tests...
			$Tester->test( 'markets', array( array( $market ) ) );

			/*echo " -> getting first market summary to test with\n";
			$market_summary = $Adapter->get_market_summary( $market );
			$Tester->test( 'market_summaries', array( array( $market_summary ) ) );

			echo " -> getting 5 entries from first orderbook\n";
			$Tester->test( 'orderbook', $Adapter->get_orderbook( $market, 5 ) );

			echo " -> getting deposit and withdrawal history\n";
			$Tester->test( 'deposits_withdrawals', $Adapter->get_deposits_withdrawals() );

			echo " -> getting deposit history\n";
			$Tester->test( 'deposits', $Adapter->get_deposits() );

			echo " -> getting withdrawal history\n";
			$Tester->test( 'withdrawals', $Adapter->get_withdrawals() );*/


			//_____TOO SLOW: ff get_market_summary passes, then this should...
			//echo " -> getting market summaries\n";
			//$market_summaries = $Adapter->get_market_summaries();
			//$Tester->test( 'market_summaries', array( $market_summaries ) );

			//_____TOO SLOW: just test cancelling 1 order
			//echo " -> cancelling all orders\n";
			//$Tester->test( 'cancel_all', $Adapter->cancel_all() );

			//_____TODO: test a buy order then cancel it
			//echo " -> making a buy order\n";
			//$buy = $Adapter->buy(  );
			//print_r( $buy );
			//$Tester->test( 'buy', array( $buy ) );

			//_____TODO: test a sell order then cancel it
			//echo " -> making a sell order\n";
			//$sell = $Adapter->sell(  );
			//$Tester->test( 'sell', array( $sell ) );
			//print_r( $sell );

			//_____TODO: make it so this only gets trades for one market
			echo " -> getting all recent trades for test market\n";
			$Tester->test( 'trades', $Adapter->get_trades( $market, array( 'time' => 60, 'limit' => 10  ) ) );

			/*echo " -> getting balances for all currencies\n";
			$Tester->test( 'balances', $Adapter->get_balances() );

			echo " -> generating deposit addresses\n";
			$Tester->test( 'deposit_addresses', $Adapter->deposit_addresses() );
			
			echo " -> getting open orders for test market\n";
			$Tester->test( 'open_orders', $Adapter->get_open_orders( $market ) );

			echo " -> getting completed orders for test market\n";
			$Tester->test( 'completed_orders', $Adapter->get_completed_orders( $market ) );

			//_____Utilities: they should have some utility

			echo " -> getting volumes\n";
			$Tester->test( 'volumes', Utilities::get_total_volumes( $Adapter->get_market_summaries() ) );

			echo " -> getting worths\n";
			$Tester->test( 'worth', Utilities::get_worth( $Adapter->get_balances(), $Adapter->get_market_summaries() ) );*/

		}
	}

?>