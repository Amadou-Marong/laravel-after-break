import { computed } from 'vue';

// export const useMonthlyPayment = (props) => {
//     const interestRate = computed(() => props.listing.interest_rate);
//     const duration = computed(() => props.listing.duration);

//     const monthlyPayment = computed(() => {
//         const principle = props.listing.price;
//         const monthlyInterest = interestRate.value / 100 / 12;
//         const numberOfPaymentMonths = duration.value * 12;

//         return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1) 
//     })

//     return {
//         monthlyPayment
//     }
// }

export const useMonthlyPayment = (total, interestRate, duration) => {
    const monthlyPayment = computed(() => {
        const principle = total;
        const monthlyInterest = interestRate.value / 100 / 12;
        const numberOfPaymentMonths = duration.value * 12;
    
        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1) 
    })

    return {
        monthlyPayment
    }
}
